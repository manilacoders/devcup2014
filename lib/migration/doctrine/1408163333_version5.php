<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version5 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addIndex('profiles', 'email_token', array(
             'fields' => 
             array(
              0 => 'email_token',
             ),
             ));
    }

    public function down()
    {
        $this->removeIndex('profiles', 'email_token', array(
             'fields' => 
             array(
              0 => 'email_token',
             ),
             ));
    }
}