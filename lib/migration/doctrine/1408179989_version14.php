<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version14 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('students', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'first_name' => 
             array(
              'type' => 'varchar',
              'length' => '50',
             ),
             'middle_name' => 
             array(
              'type' => 'varchar',
              'length' => '50',
             ),
             'last_name' => 
             array(
              'type' => 'varchar',
              'length' => '50',
             ),
             'email' => 
             array(
              'type' => 'varchar',
              'length' => '50',
             ),
             'password' => 
             array(
              'type' => 'varchar',
              'length' => '50',
             ),
             'section_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'is_active' => 
             array(
              'type' => 'boolean',
              'length' => '25',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'indexes' => 
             array(
              'first_name' => 
              array(
              'fields' => 
              array(
               0 => 'first_name',
              ),
              ),
              'middle_name' => 
              array(
              'fields' => 
              array(
               0 => 'middle_name',
              ),
              ),
              'last_name' => 
              array(
              'fields' => 
              array(
               0 => 'last_name',
              ),
              ),
              'email' => 
              array(
              'fields' => 
              array(
               0 => 'email',
              ),
              ),
              'is_active' => 
              array(
              'fields' => 
              array(
               0 => 'is_active',
              ),
              ),
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
        $this->createTable('student_section', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'student_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'section_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
        $this->dropTable('students');
        $this->dropTable('student_section');
    }
}