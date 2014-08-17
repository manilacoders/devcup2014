<?php 
/**
* 
* @author Kenn Capara
*/
class computeAction extends sfActions
{
  /**
   * Executes  action
   *
   * @param sfWebRequest  A request object
   **/
  public function execute($request)
  {
    $post = $this->request->getPostParameters();
    if ($request->isMethod(sfRequest::POST)) {

      $exam = ExamTable::getInstance()->findOneById($post['exam_id']);
      if (! $exam) {
        throw new Exception("Questionnaire not found.");
      }

      $questions = $exam->getQuestions();
      foreach ($questions as $question) {
        echo "<pre>";
        print_r($question); exit; 
      }
      echo "<pre>";
      print_r($post); exit; 
    }
  }
}