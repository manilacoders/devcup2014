<?php

/**
 * BaseSection
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property varchar $name
 * @property integer $profile_id
 * @property Doctrine_Collection $id
 * 
 * @method varchar             getName()       Returns the current record's "name" value
 * @method integer             getProfileId()  Returns the current record's "profile_id" value
 * @method Doctrine_Collection getId()         Returns the current record's "id" collection
 * @method Section             setName()       Sets the current record's "name" value
 * @method Section             setProfileId()  Sets the current record's "profile_id" value
 * @method Section             setId()         Sets the current record's "id" collection
 * 
 * @package    devcup2014
 * @subpackage model
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSection extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sections');
        $this->hasColumn('name', 'varchar', 50, array(
             'type' => 'varchar',
             'length' => 50,
             ));
        $this->hasColumn('profile_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Profile as id', array(
             'local' => 'id',
             'foreign' => 'section_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}