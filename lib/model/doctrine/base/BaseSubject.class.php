<?php

/**
 * BaseSubject
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $profile_id
 * @property Profile $profile
 * @property Doctrine_Collection $exams
 * 
 * @method string              getName()       Returns the current record's "name" value
 * @method integer             getProfileId()  Returns the current record's "profile_id" value
 * @method Profile             getProfile()    Returns the current record's "profile" value
 * @method Doctrine_Collection getExams()      Returns the current record's "exams" collection
 * @method Subject             setName()       Sets the current record's "name" value
 * @method Subject             setProfileId()  Sets the current record's "profile_id" value
 * @method Subject             setProfile()    Sets the current record's "profile" value
 * @method Subject             setExams()      Sets the current record's "exams" collection
 * 
 * @package    devcup2014
 * @subpackage model
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSubject extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('subjects');
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('profile_id', 'integer', null, array(
             'type' => 'integer',
             ));


        $this->index('name', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Profile as profile', array(
             'local' => 'profile_id',
             'foreign' => 'id'));

        $this->hasMany('Exam as exams', array(
             'local' => 'id',
             'foreign' => 'subject_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}