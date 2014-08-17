<?php

/**
 * students actions.
 *
 * @package    devcup2014
 * @subpackage students
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class studentsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->setLayout('dashboard');
    $user = $this->getUser();

    $teacher = ProfileTable::getInstance()->findOneById($user->getAttribute('user')['id']);
    if ($teacher == false) {
      throw new Exception('Please login your teacher account!');
    }

    $q = StudentSectionTable::getInstance()->createQuery('s');
    $q
      ->where('s.section_id = ?', $teacher['section_id'])
      ->orderBy('s.id DESC');

    $students = $q->fetchArray();

    $this->students = array();
    foreach ($students as $student) {
      $this->students[] = StudentTable::getInstance()->findOneById($student['student_id'])->toArray();
    }

    if ($request->isMethod(sfRequest::POST)) {
      $post = $request->getPostParameters();

      $student = new Student;
      $student
        ->setFirstName($post['first_name'])
        ->setMiddleName($post['middle_name'])
        ->setLastName($post['last_name'])
        ->setEmail($post['email'])
        ->setPassword(sha1($post['password']))
        ->save();

      $student_section = new StudentSection;
      $student_section
        ->setStudentId($student->getId())
        ->setSectionId($teacher['section_id'])
        ->save();

      $this->getUser()->setFlash('success', 'Created a new account for ' . $post['first_name'] . ' ' . $post['last_name']);
      $this->redirect($request->getReferer());
    }

  }

  public function executeDelete(sfWebRequest $request)
  {
    $student_id = $request->getParameter('student_id');

    $student = StudentTable::getInstance()->findOneById($student_id);
    if ($student == false) {
      $this->getUser()->setFlash('error_head', 'Student not found!');
      $this->redirect($request->getReferer());
    }
    $s = $student->toArray();

    $student->delete();

    $this->getUser()->setFlash('success_head', 'Done deleting ' . $s['first_name'] . ' ' . $s['last_name']);
    $this->redirect($request->getReferer());
  }

  public function executeUpdate(sfWebRequest $request)
  {

  }
}
