<?php

/**
 * BaseProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property varchar $type
 * @property varchar $first_name
 * @property varchar $middle_name
 * @property varchar $last_name
 * @property varchar $email
 * @property varchar $password
 * @property varchar $status
 * 
 * @method varchar getType()        Returns the current record's "type" value
 * @method varchar getFirstName()   Returns the current record's "first_name" value
 * @method varchar getMiddleName()  Returns the current record's "middle_name" value
 * @method varchar getLastName()    Returns the current record's "last_name" value
 * @method varchar getEmail()       Returns the current record's "email" value
 * @method varchar getPassword()    Returns the current record's "password" value
 * @method varchar getStatus()      Returns the current record's "status" value
 * @method Profile setType()        Sets the current record's "type" value
 * @method Profile setFirstName()   Sets the current record's "first_name" value
 * @method Profile setMiddleName()  Sets the current record's "middle_name" value
 * @method Profile setLastName()    Sets the current record's "last_name" value
 * @method Profile setEmail()       Sets the current record's "email" value
 * @method Profile setPassword()    Sets the current record's "password" value
 * @method Profile setStatus()      Sets the current record's "status" value
 * 
 * @package    devcup2014
 * @subpackage model
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profiles');
        $this->hasColumn('type', 'varchar', 50, array(
             'type' => 'varchar',
             'length' => 50,
             ));
        $this->hasColumn('first_name', 'varchar', 50, array(
             'type' => 'varchar',
             'length' => 50,
             ));
        $this->hasColumn('middle_name', 'varchar', 50, array(
             'type' => 'varchar',
             'length' => 50,
             ));
        $this->hasColumn('last_name', 'varchar', 50, array(
             'type' => 'varchar',
             'length' => 50,
             ));
        $this->hasColumn('email', 'varchar', 50, array(
             'type' => 'varchar',
             'length' => 50,
             ));
        $this->hasColumn('password', 'varchar', 50, array(
             'type' => 'varchar',
             'length' => 50,
             ));
        $this->hasColumn('status', 'varchar', 50, array(
             'type' => 'varchar',
             'length' => 50,
             ));


        $this->index('type', array(
             'fields' => 
             array(
              0 => 'type',
             ),
             ));
        $this->index('first_name', array(
             'fields' => 
             array(
              0 => 'first_name',
             ),
             ));
        $this->index('middle_name', array(
             'fields' => 
             array(
              0 => 'middle_name',
             ),
             ));
        $this->index('last_name', array(
             'fields' => 
             array(
              0 => 'last_name',
             ),
             ));
        $this->index('email', array(
             'fields' => 
             array(
              0 => 'email',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}