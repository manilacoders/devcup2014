<?php

/**
 * Question form base class.
 *
 * @method Question getObject() Returns the current form's model object
 *
 * @package    devcup2014
 * @subpackage form
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuestionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'type'       => new sfWidgetFormInputText(),
      'question'   => new sfWidgetFormTextarea(),
      'metadata'   => new sfWidgetFormInputText(),
      'answer'     => new sfWidgetFormInputText(),
      'exam_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('exam'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'question'   => new sfValidatorString(array('required' => false)),
      'metadata'   => new sfValidatorPass(array('required' => false)),
      'answer'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'exam_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('exam'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('question[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Question';
  }

}
