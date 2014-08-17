<?php

/**
 * ExamResult form base class.
 *
 * @method ExamResult getObject() Returns the current form's model object
 *
 * @package    devcup2014
 * @subpackage form
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExamResultForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'student_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('student'), 'add_empty' => true)),
      'exam_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('exam'), 'add_empty' => true)),
      'correct_count'  => new sfWidgetFormInputText(),
      'question_count' => new sfWidgetFormInputText(),
      'score'          => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'student_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('student'), 'required' => false)),
      'exam_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('exam'), 'required' => false)),
      'correct_count'  => new sfValidatorInteger(array('required' => false)),
      'question_count' => new sfValidatorInteger(array('required' => false)),
      'score'          => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('exam_result[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExamResult';
  }

}
