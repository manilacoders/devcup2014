<?php 


/**
* 
* @author Phillip Villarosa
*/
class startAction extends sfActions
{
  /**
   * Executes  action
   *
   * @param sfWebRequest  A request object
   **/
  public function execute($request)
  {
    $this->setLayout('student');

    $id = $request->getParameter('exam_id');
    if (! $id) {
      throw new Exception("Invalid Questionnaire ID.");
    }

    $exam = ExamTable::getInstance()->findOneById($id);
    if (! $exam) {
      throw new Exception("Questionnaire not found.");
    }

    $this->exam = $exam->toArray();

    $questions = $exam->getQuestions()->toArray();

  	$this->questions = $questions;
  }
}