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
    if ($request->isMethod(sfRequest::POST)) {
      $user = $this->getUser();
      $post = $request->getPostParameters();

      $exam = new Exam;
      $exam
        ->setName($post['name'])
        ->setProfileId($user->getAttribute('profile_id'))
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
        ->setProfileId($user->getAttribute('profile_id'))
        ->save();

      $this->redirect('tempExams/index');
    }
  }

}
