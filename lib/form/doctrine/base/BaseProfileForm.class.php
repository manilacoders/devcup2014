<?php

/**
 * Profile form base class.
 *
 * @method Profile getObject() Returns the current form's model object
 *
 * @package    devcup2014
 * @subpackage form
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'type'        => new sfWidgetFormInputText(),
      'first_name'  => new sfWidgetFormInputText(),
      'middle_name' => new sfWidgetFormInputText(),
      'last_name'   => new sfWidgetFormInputText(),
      'email'       => new sfWidgetFormInputText(),
      'password'    => new sfWidgetFormInputText(),
      'section_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('section'), 'add_empty' => true)),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'email_token' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'        => new sfValidatorPass(array('required' => false)),
      'first_name'  => new sfValidatorPass(array('required' => false)),
      'middle_name' => new sfValidatorPass(array('required' => false)),
      'last_name'   => new sfValidatorPass(array('required' => false)),
      'email'       => new sfValidatorPass(array('required' => false)),
      'password'    => new sfValidatorPass(array('required' => false)),
      'section_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('section'), 'required' => false)),
      'is_active'   => new sfValidatorBoolean(array('required' => false)),
      'email_token' => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

}
