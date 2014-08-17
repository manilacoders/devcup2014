<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version20 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropForeignKey('answers', 'answers_profile_id_profiles_id');
    }

    public function down()
    {
        $this->createForeignKey('answers', 'answers_profile_id_profiles_id', array(
             'name' => 'answers_profile_id_profiles_id',
             'local' => 'profile_id',
             'foreign' => 'id',
             'foreignTable' => 'profiles',
             ));
    }
}