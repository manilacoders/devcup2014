<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version9 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addIndex('profiles', 'is_active', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
    }

    public function down()
    {
        $this->removeIndex('profiles', 'is_active', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
    }
}