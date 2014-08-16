<?php

/**
 * StudentSection filter form base class.
 *
 * @package    devcup2014
 * @subpackage filter
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStudentSectionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Student'), 'add_empty' => true)),
      'section_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Section'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'student_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Student'), 'column' => 'id')),
      'section_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Section'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('student_section_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentSection';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'student_id' => 'ForeignKey',
      'section_id' => 'ForeignKey',
    );
  }
}
