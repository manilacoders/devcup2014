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

    $questions = $exam->getQuestions();

    $questions = array(
      array(
        'id' => 1,
        'question' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'metadata' => array(
          'values' => array(
            'a' => 'Choice A',
            'b' => 'Choice B',
            'c' => 'Choice C',
            'd' => 'Choice D',
          ),
        ),
      ),
      array(
        'id' => 2,
        'question' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'metadata' => array(
          'values' => array(
            'a' => 'Choice A',
            'b' => 'Choice B',
            'c' => 'Choice C',
            'd' => 'Choice D',
          ),
        ),
      ),
    );

  	$this->questions = $questions;
  }
}