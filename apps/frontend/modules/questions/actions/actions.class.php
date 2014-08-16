<?php

/**
 * questions actions.
 *
 * @package    devcup2014
 * @subpackage questions
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class questionsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $question = QuestionTable::getInstance();
    $q = $question->createQuery('q');
      ->where('q.id = ?', $id);
  }
}
