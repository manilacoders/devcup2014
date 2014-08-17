<?php

/**
 * examination actions.
 *
 * @package    devcup2014
 * @subpackage examination
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class examinationActions extends sfActions
{

 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeCreateNew(sfWebRequest $request)
  {
    $user = $this->getUser();
    $profileId = $user->getAttribute('user')->getId();

    $post = $this->request->getPostParameters();

    if ($request->isMethod(sfRequest::POST)) {

      try {
        Doctrine_Manager::connection()->beginTransaction();
       
        $exam = ExamTable::getInstance()->findOneByNameAndProfileId($post['exam_name'], $profileId);
        if ($exam) {
          throw new Exception("Examination Name is already exist.");
        }

        $exam = new Exam;
        $exam
          ->setName($post['exam_name'])
          ->setProfileId($profileId)
          ->setActiveAt(date('Y-m-d H:i:s', strtotime($post['active_at'])))
          ->setEndAt(date('Y-m-d H:i:s', strtotime($post['end_at'])))
          ->setSubjectId($post['subject_id'])
          ->save();

        foreach ($post['questions'] as $question) {
          $new_question = new Question;
          $new_question
            ->setQuestion($question['question'])
            ->setMetadata(array('values' => $question['values']))
            ->setAnswer($question['answer'])
            ->setExam($exam)
            ->save();
        }
        
        Doctrine_Manager::connection()->commit();
      } catch (Exception $e) {
        Doctrine_Manager::connection()->rollback();
        throw $e;
      }
    }
  }

  public function executeGetPage(sfWebRequest $request)
  {
    $user = $this->getUser();

    $profile = ProfileTable::getInstance()->findOneByEmail($user->getEmail());

    $subjects = $profile->getSubject();

    $page = $request->getParameter('page');
		switch ($page) {
			case 'new':
				return $this->renderPartial('examination/new', array(
          'subjects' => $subjects->toArray(),
        ));
				break;

			case 'monitoring':
				return $this->renderPartial('examination/monitoring');
				break;

			case 'subject':
				return $this->renderPartial('examination/subject', array(
          'subjects' => $subjects->toArray(),
        ));
				break;

			case 'manage':
        $exams = ExamTable::getInstance()->findByProfileId($profile['id']);

				return $this->renderPartial('examination/manage', array(
          'exams' => $exams->toArray(),
        ));
				break;

			case 'schedules':
        $exams = ExamTable::getInstance()->findByProfileId($profile['id']);
  

				return $this->renderPartial('examination/schedules', array(
          'exams' => $exams->toArray(),
        ));
				break;
			
			default:
				# code...
				break;
		}

  }

  public function executeGetQuestionTemplate(sfWebRequest $request)
  {
  	$temp = $request->getParameter('temp');
    $this->question_index = $request->getParameter('question_index');

		switch ($temp) {
			case 'multiple':
				return $this->renderPartial('examination/multiple');
				break;

			case 'essay':
				return $this->renderPartial('examination/essay');
				break;

			default:
				# code...
				break;
		}
  }
}
