<?php

/**
 * tempExams actions.
 *
 * @package    devcup2014
 * @subpackage tempExams
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tempExamsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $user = $this->getUser();

    $exams = ExamTable::getInstance()->createQuery('e');
    $exams
      ->select('e.*, q.*, se.*, count(q.id) as q_count')
      ->where('e.profile_id = ?', $user->getAttribute('user')['id'])
      ->leftJoin('e.questions q')
      ->groupBy('q.exam_id')
      ->orderBy('created_at DESC');

    $this->lists = $exams->fetchArray();
  }

  public function executeCreate(sfWebRequest $request)
  {
    if ($request->isMethod(sfRequest::POST)) {
      $user = $this->getUser();
      $post = $request->getPostParameters();

      $exam = new Exam;
      $exam
        ->setName($post['name'])
        ->setProfileId($user->getAttribute('user')['id'])
        ->save();

      $this->redirect('tempExams/index');
    }
  }

  public function executeEdit(sfWebRequest $request)
  {
    if ($request->isMethod(sfRequest::POST)) {
      $user = $this->getUser();
      $post = $request->getPostParameters();

      $exam = ExamTable::getInstance()->findOneById($post['id']);
      $exam
        ->setName($post['name'])
        ->setProfileId($user->getAttribute('user')['id'])
        ->save();

      $this->redirect('tempExams/index');
    }
  }

}
