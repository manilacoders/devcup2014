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
    $user = $this->getUser();
    $studentId = $user->getAttribute('user')->getId();

    $post = $this->request->getPostParameters();

    if ($request->isMethod(sfRequest::POST)) {

      try {
        Doctrine_Manager::connection()->beginTransaction();
       
        $exam = ExamTable::getInstance()->findOneById($post['exam_id']);
        if (! $exam) {
          throw new Exception("Questionnaire not found.");
        }

        $questions = $exam->getQuestions();

        $correct_count = 0;
        foreach ($questions as $question) {
          $answer = $post['answers'][$question['id']];

          if ($answer == $question['answer']) {
            $correct_count++;
          }

          $new_answer = new Answer;
          $new_answer
            ->setStudentId($studentId)
            ->setQuestion($question)
            ->setAnswer($answer)
            ->save();
        }

        $question_count = count($questions);

        $score = ($correct_count / $question_count) * 100;

        $exam_result = new ExamResult;
        $exam_result
          ->setExam($exam)
          ->setStudentId($studentId)
          ->setCorrectCount($correct_count)
          ->setQuestionCount($question_count)
          ->setScore($score)
          ->save();
       
        Doctrine_Manager::connection()->commit();
      } catch (Exception $e) {
        Doctrine_Manager::connection()->rollback();
        throw $e;
      }
    }
  }
}