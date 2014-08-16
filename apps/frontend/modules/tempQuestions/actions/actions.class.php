<?php

/**
 * tempQuestions actions.
 *
 * @package    devcup2014
 * @subpackage tempQuestions
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tempQuestionsActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $user = $this->getUser();

    $exam = ExamTable::getInstance()->findOneById($request->getParameter('exam_id'));

    $questions = QuestionTable::getInstance()->findByExamId($request->getParameter('exam_id'));
    $this->lists = $questions->toArray();

    $this->exam = $exam->toArray();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $exam_id = $request->getParameter('exam_id');


    if ($request->isMethod(sfRequest::POST)) {
      $user = $this->getUser();
      $post = $request->getPostParameters();

      //get the answer
      $arr = array();
      if ($post['type'] == 'choice') {
        $answer = $post['answer'];
        for($i=0;$i<count($post['choices']['val']);$i++) {
          $arr[] = array(
            $post['choices']['key'][$i] => $post['choices']['val'][$i],
          );
        }
      } else {
        $arr = $post['choices']['val'][0];
      }

      // save to database
      $question = new Question;
      $question
        ->setType($post['type'])
        ->setQuestion($post['question'])
        ->setMetaData(json_encode($arr))
        ->setAnswer($post['answer'])
        ->setExamId($post['exam_id'])
        ->save();

      $this->redirect('tempQuestions/index?exam_id='.$post['exam_id']);
    }

    $this->types = array(
      'choice' => 'Choices',
      'text' => 'Essay',
    );
    $this->exam_id = $exam_id;
  }

  public function executeEdit(sfWebRequest $request)
  {
    if ($request->isMethod(sfRequest::POST)) {
      $user = $this->getUser();
      $post = $request->getPostParameters();

      $exam = ExamTable::getInstance()->findOneById($post['id']);
      $exam
        ->setName($post['name'])
        ->setProfileId($user->getAttribute('profile_id'))
        ->save();

      $this->redirect('tempExams/index');
    }
  }

}
