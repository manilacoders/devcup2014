<?php

/**
 * tempReports actions.
 *
 * @package    devcup2014
 * @subpackage tempReports
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tempReportsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $user = $this->getUser();
    
    $profile = ProfileTable::getInstance();
    $teacher = $profile->findOneById($user->getAttribute('profile_id'));

    foreach ($teacher->getExams() as $exam) {
      $exam->getQuestions();
    }

    echo '<pre>';
    print_r($teacher->toArray());
    exit;
  }
}
