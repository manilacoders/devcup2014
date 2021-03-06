<?php

/**
 * static actions.
 *
 * @package    devcup2014
 * @subpackage static
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staticActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeHome(sfWebRequest $request) 
  {
    $user = $this->getUser();
    if ($user->isAuthenticated()) {
      $credentials = $user->getCredentials();
      switch ($creadentials[0]) {
        case 'teacher':
          $this->redirect("@dashboard");
          break;
        
        default:
          $this->redirect('examination/list');
          break;
      }
    }
  }
}
