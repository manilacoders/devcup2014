<?php

/**
 * security actions.
 *
 * @package    devcup2014
 * @subpackage security
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class securityActions extends sfActions
{
  public function executeLogin(sfWebRequest $request)
  {
    if ($request->isMethod(sfRequest::POST)) {
      $post = $request->getPostParameters();

      $profile = ProfileTable::getInstance()->findOneByEmailAndPassword($post['email'], $post['password']);
      if ($profile == false) {
        throw new Exception('Email or Password no found');
      }

      $this->getUser()->setAttribute('profile_id', $profile['id']);
      $this->redirect('tempExams/index');
    }


  }
}
