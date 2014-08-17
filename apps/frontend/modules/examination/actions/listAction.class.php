<?php 


/**
* 
* @author Kenn Capara
*/
class listAction extends sfActions
{
  /**
   * Executes  action
   *
   * @param sfWebRequest  A request object
   **/
  public function execute($request)
  {
    $user = $this->getUser();

  	$this->setLayout('student');

    $student = StudentTable::getInstance()->findOneByEmail($user->getEmail());
    if (! $student) {
      throw new Exception("Student not found.");
    }

    $this->student = $student;

    $sections = $student->getSections();

    $section = array();
    if ($sections) {
      // We need only the first section since the student should only has 1 section.
      $section = $sections[0];
    }

    $this->section = $section;
    $subjects = $section->getSubjects()->toArray();
    $this->subjects = $subjects;
  }
}