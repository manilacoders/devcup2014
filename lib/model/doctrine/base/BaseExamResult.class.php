<?php

/**
 * BaseExamResult
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $student_id
 * @property integer $exam_id
 * @property integer $correct_count
 * @property integer $question_count
 * @property integer $score
 * @property Student $student
 * @property Exam $exam
 * 
 * @method integer    getStudentId()      Returns the current record's "student_id" value
 * @method integer    getExamId()         Returns the current record's "exam_id" value
 * @method integer    getCorrectCount()   Returns the current record's "correct_count" value
 * @method integer    getQuestionCount()  Returns the current record's "question_count" value
 * @method integer    getScore()          Returns the current record's "score" value
 * @method Student    getStudent()        Returns the current record's "student" value
 * @method Exam       getExam()           Returns the current record's "exam" value
 * @method ExamResult setStudentId()      Sets the current record's "student_id" value
 * @method ExamResult setExamId()         Sets the current record's "exam_id" value
 * @method ExamResult setCorrectCount()   Sets the current record's "correct_count" value
 * @method ExamResult setQuestionCount()  Sets the current record's "question_count" value
 * @method ExamResult setScore()          Sets the current record's "score" value
 * @method ExamResult setStudent()        Sets the current record's "student" value
 * @method ExamResult setExam()           Sets the current record's "exam" value
 * 
 * @package    devcup2014
 * @subpackage model
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseExamResult extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('exam_results');
        $this->hasColumn('student_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('exam_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('correct_count', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('question_count', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('score', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Student as student', array(
             'local' => 'student_id',
             'foreign' => 'id'));

        $this->hasOne('Exam as exam', array(
             'local' => 'exam_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}