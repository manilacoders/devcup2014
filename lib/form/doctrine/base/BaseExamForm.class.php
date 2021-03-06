<?php

/**
 * Exam form base class.
 *
 * @method Exam getObject() Returns the current form's model object
 *
 * @package    devcup2014
 * @subpackage form
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExamForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'profile_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('profile'), 'add_empty' => true)),
      'active_at'  => new sfWidgetFormDateTime(),
      'end_at'     => new sfWidgetFormDateTime(),
      'subject_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('subject'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'profile_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('profile'), 'required' => false)),
      'active_at'  => new sfValidatorDateTime(array('required' => false)),
      'end_at'     => new sfValidatorDateTime(array('required' => false)),
      'subject_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('subject'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('exam[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Exam';
  }

}
