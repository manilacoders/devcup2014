<?php

/**
 * reports actions.
 *
 * @package    devcup2014
 * @subpackage reports
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reportsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->setLayout('dashboard');
  }

  public function executeMostExams(sfWebRequest $request)
  {
    
  }
}
