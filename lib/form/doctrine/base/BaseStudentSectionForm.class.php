<?php

/**
 * StudentSection form base class.
 *
 * @method StudentSection getObject() Returns the current form's model object
 *
 * @package    devcup2014
 * @subpackage form
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStudentSectionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'student_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Student'), 'add_empty' => true)),
      'section_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Section'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'student_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Student'), 'required' => false)),
      'section_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Section'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_section[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentSection';
  }

}
