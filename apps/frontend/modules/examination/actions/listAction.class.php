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
  	$this->setLayout('student');

  	$subjects = SubjectTable::getInstance()->findAll();

  	$this->subjects = $subjects;

  }
}