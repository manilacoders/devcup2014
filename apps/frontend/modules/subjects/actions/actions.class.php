<?php

/**
 * subjects actions.
 *
 * @package    devcup2014
 * @subpackage subjects
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class subjectsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeList(sfWebRequest $request)
  {
    $this->setLayout('student');
    $id = $request->getParameter('id');

    $subject = SubjectTable::getInstance()->findOneById($id);
    $exams = $subject->getExams();

    $this->exams = $exams->toArray();
  }
}
