<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version19 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('exams', 'exams_subject_id_subjects_id', array(
             'name' => 'exams_subject_id_subjects_id',
             'local' => 'subject_id',
             'foreign' => 'id',
             'foreignTable' => 'subjects',
             ));
        $this->createForeignKey('subjects', 'subjects_profile_id_profiles_id', array(
             'name' => 'subjects_profile_id_profiles_id',
             'local' => 'profile_id',
             'foreign' => 'id',
             'foreignTable' => 'profiles',
             ));
        $this->addIndex('exams', 'exams_subject_id', array(
             'fields' => 
             array(
              0 => 'subject_id',
             ),
             ));
        $this->addIndex('subjects', 'subjects_profile_id', array(
             'fields' => 
             array(
              0 => 'profile_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('exams', 'exams_subject_id_subjects_id');
        $this->dropForeignKey('subjects', 'subjects_profile_id_profiles_id');
        $this->removeIndex('exams', 'exams_subject_id', array(
             'fields' => 
             array(
              0 => 'subject_id',
             ),
             ));
        $this->removeIndex('subjects', 'subjects_profile_id', array(
             'fields' => 
             array(
              0 => 'profile_id',
             ),
             ));
    }
}