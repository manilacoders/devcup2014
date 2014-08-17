<?php

/**
 * tempReports actions.
 *
 * @package    devcup2014
 * @subpackage tempReports
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tempReportsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->setLayout('dashboard');
  }

  public function executeExamResults(sfWebRequest $request)
  {
    $this->setLayout('dashboard');
    $user = $this->getUser();
    
    $teacher = ProfileTable::getInstance();
    $teacher = $teacher->findOneById($user->getAttribute('user')['id']);

    foreach ($teacher->getExams() as $exam) {
      $exam->getQuestions();
    }


    $teacher = ProfileTable::getInstance();
    $q = $teacher->createQuery('p');
    $q
      ->where('p.id = ?', $user->getAttribute('user')['id'])
      ->leftJoin('p.exams as e')
        ->leftJoin('e.questions as eq');

    $exam_results = array();
    foreach ($q->fetchArray()[0]['exams'] as $exam) {
      $exam_results[$exam['name']] = array(
        'id' => $exam['id'],
        'created_at' => date('F j, Y', strtotime($exam['created_at'])),
        'passed' => 0,
        'failed' => 0
      );

      foreach ($exam['questions'] as $question) {
        $answers = AnswerTable::getInstance()->findByQuestionId($question['id']);
        if (!$answers) {
          continue;
        }

        foreach ($answers as $answer) {
          if ($answer['answer'] == $question['answer']) {
            $exam_results[$exam['name']]['passed'] += 1;
          } else {
            $exam_results[$exam['name']]['failed'] += 1;
          }
        }

      }
    }

    $arr_labels = array();
    $arr_data = array();
    $arr_data_two = array();
    foreach ($exam_results as $name => $result) {
      $arr_labels[] = $name;
      $arr_data[] = $result['passed'];
      $arr_data_two[] = $result['failed'];
    }

    $data = [
      'labels' => $arr_labels,
      'datasets' => [
        [
          'label' => "",
          'fillColor' => "rgba(220,220,220,0.5)",
          'strokeColor' => "rgba(220,220,220,0.8)",
          'highlightFill' => "rgba(220,220,220,0.75)",
          'highlightStroke' => "rgba(220,220,220,1)",
          'data' => $arr_data,
        ],
        [
          'label' => "My Second dataset",
          'fillColor' => "rgba(151,187,205,0.5)",
          'strokeColor' => "rgba(151,187,205,0.8)",
          'highlightFill' => "rgba(151,187,205,0.75)",
          'highlightStroke' => "rgba(151,187,205,1)",
          'data' => $arr_data_two
        ]
      ]
    ];

    $this->data = json_encode($data);
    $this->exams = $exam_results;
  }

  public function executeQuestionResults(sfWebRequest $request)
  {
    $this->setLayout('dashboard');
    $user = $this->getUser();
    
    $exam_id = $request->getParameter('exam_id');

    $teacher = ProfileTable::getInstance();
    $q = $teacher->createQuery('p');
    $q
      ->where('p.id = ?', $user->getAttribute('user')['id'])
      ->leftJoin('p.exams as e')
        ->leftJoin('e.questions as eq')
      ->addWhere('e.id = ?', $exam_id)
      ->orderBy('eq.id ASC');

    $question_results = array();
    foreach ($q->fetchArray()[0]['exams'] as $exam) {
      foreach ($exam['questions'] as $question) {

        $question_results[$question['id']] = array(
          'name' => $question['question'],
          'passed' => 0,
          'failed' => 0
        );

        $answers = AnswerTable::getInstance()->findByQuestionId($question['id']);
        if (!$answers) {
          continue;
        }

        foreach ($answers as $answer) {
          if ($answer['answer'] == $question['answer']) {
            $question_results[$question['id']]['passed'] += 1;
          } else {
            $question_results[$question['id']]['failed'] += 1;
          }
        }

      }
    }

    $arr_labels = array();
    $arr_data = array();
    $arr_data_two = array();
    foreach ($question_results as $name => $result) {
      $arr_labels[] = $result['name'];
      $arr_data[] = $result['passed'];
      $arr_data_two[] = $result['failed'];
    }

    $data = [
      'labels' => $arr_labels,
      'datasets' => [
        [
          'label' => "",
          'fillColor' => "rgba(220,220,220,0.5)",
          'strokeColor' => "rgba(220,220,220,0.8)",
          'highlightFill' => "rgba(220,220,220,0.75)",
          'highlightStroke' => "rgba(220,220,220,1)",
          'data' => $arr_data,
        ],
        [
          'label' => "",
          'fillColor' => "rgba(220,220,220,0.5)",
          'strokeColor' => "rgba(220,220,220,0.8)",
          'highlightFill' => "rgba(220,220,220,0.75)",
          'highlightStroke' => "rgba(220,220,220,1)",
          'data' => $arr_data_two,
        ],
      ]
    ];

    $this->data = json_encode($data);

    $this->questions = $question_results;
  }

  public function executeStudents(sfWebRequest $request)
  {
    $this->setLayout('dashboard');
    $user = $this->getUser();

    $teacher = ProfileTable::getInstance()->findOneById($user->getAttribute('user')['id']);

    $students = StudentSectionTable::getInstance()->findBySectionId($teacher['section_id']);

    $this->students = array();
    foreach ($students as $student) {
      $this->students[] = StudentTable::getInstance()->findOneById($student['student_id'])->toArray();
    }
  }

  public function executeStudentStat(sfWebRequest $request)
  {
    $this->setLayout('dashboard');
    $user = $this->getUser();
    $student = StudentTable::getInstance()->findOnebyId($request->getParameter('student_id'));
    if ($student == false) {
      throw new Exception('Student not found!');
    }

    $results = ExamResultTable::getInstance()->findByStudentId($student['id']);

    foreach ($results as $result) {
      $result->getExam();
      $result->getStudent();
    }

    // echo '<pre>';
    // print_r($results->toArray());

    $arr = array();
    foreach ($results as $result) {
      $subject = SubjectTable::getInstance()->findOneById($result['exam']['subject_id']);
      $avg_result_value = (($result['correct_count'] / $result['question_count']) * 100);

      $arr[$subject['name']] = array(
        'id' => $subject['id'],
      );

      if (isset($arr[$subject['name']]['total'])) {
        $arr[$subject['name']]['total'] = ($arr[$subject['name']]['total'] + $avg_result_value) / 2;
      } else {
        $arr[$subject['name']]['total'] = ($avg_result_value);
      }
    }

    // count overall
    $overall_total = 0;
    foreach ($arr as $a) {
      @$overall_total += $a['total'];
    }
    if ($overall_total != 0) {
      $overall_total = $overall_total / count($arr);
    }

    $arr['Overall Total'] = array(
      'total' => $overall_total,
    );  

    $arr_labels = array();
    $arr_data = array();
    $arr_data_two = array();
    foreach ($arr as $name => $result) {
      $arr_labels[] = $name;
      $arr_data[] = $result['total'];
    }

    $data = [
      'labels' => $arr_labels,
      'datasets' => [
        [
          'label' => "",
          'fillColor' => "rgba(220,220,220,0.5)",
          'strokeColor' => "rgba(220,220,220,0.8)",
          'highlightFill' => "rgba(220,220,220,0.75)",
          'highlightStroke' => "rgba(220,220,220,1)",
          'data' => $arr_data,
        ],
      ]
    ];

    $this->data = json_encode($data);

    $this->subjects = $arr;

  }

 }
