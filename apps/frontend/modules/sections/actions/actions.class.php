<?php

/**
 * sections actions.
 *
 * @package    devcup2014
 * @subpackage sections
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sectionsActions extends sfActions
{
  /**
   * Executes CreateNew action
   *
   * @param sfWebRequest  A request object
   **/
  public function executeCreateNew(sfWebRequest $request)
  {
    $user = $this->getUser();
    
    $post = $request->getPostParameters();
    try {
      
    } catch (Exception $e) {
      
    }
  }
}
