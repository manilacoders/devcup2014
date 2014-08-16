<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version7 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('questions', 'questions_exam_id_exams_id', array(
             'name' => 'questions_exam_id_exams_id',
             'local' => 'exam_id',
             'foreign' => 'id',
             'foreignTable' => 'exams',
             ));
        $this->addIndex('questions', 'questions_exam_id', array(
             'fields' => 
             array(
              0 => 'exam_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('questions', 'questions_exam_id_exams_id');
        $this->removeIndex('questions', 'questions_exam_id', array(
             'fields' => 
             array(
              0 => 'exam_id',
             ),
             ));
    }
}