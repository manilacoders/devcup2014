<?php

/**
 * ExamResult filter form base class.
 *
 * @package    devcup2014
 * @subpackage filter
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExamResultFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('student'), 'add_empty' => true)),
      'exam_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('exam'), 'add_empty' => true)),
      'correct_count'  => new sfWidgetFormFilterInput(),
      'question_count' => new sfWidgetFormFilterInput(),
      'score'          => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'student_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('student'), 'column' => 'id')),
      'exam_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('exam'), 'column' => 'id')),
      'correct_count'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'question_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'score'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('exam_result_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExamResult';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'student_id'     => 'ForeignKey',
      'exam_id'        => 'ForeignKey',
      'correct_count'  => 'Number',
      'question_count' => 'Number',
      'score'          => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
