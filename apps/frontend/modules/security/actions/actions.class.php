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
    $post = $request->getPostParameters();

    if ($request->isMethod(sfRequest::POST)) {
      $email = $request->getParameter('email');
      $password = $request->getParameter('password');

      $user = ProfileTable::getInstance()->findOneByEmail($post['email']);
      $group = 'teacher';
      if (! $user) {
        $user = StudentTable::getInstance()->findOneByEmail($post['email']);
        if (! $user) {
          throw new Exception("Email address not yet registered");
        }
        $group = 'student';
      }

      if ($user->getPassword() == self::_hashPassword($password)) {
        $this->getUser()->setAuthenticated(true);
        $this->getUser()->setAttribute('user', $user);

        $this->getUser()->clearCredentials();
        $this->getUser()->addCredentials(array($group));

        if ($group == 'teacher') {
          $this->redirect('dashboard/index');
        } else {
          $this->redirect('examination/list');
        }
        
      } else {
        $this->getUser()->setFlash('error', 'Access Denied, Invalid Username/Password');
        $this-redirect($request->getReferer());
      }
    }
  }

  /**
   * Executes Logout action
   *
   * @param sfWebRequest  A request object
   **/
  public function executeLogout(sfWebRequest $request)
  {
    $this->getUser()->setAuthenticated(false);
    $this->getUser()->shutdown();
    session_destroy();
    $this->redirect('@homepage');
  }

  /**
   * Short Description here.
   *
   * @author Kenn Capara
   * @return void
   */
  public static function _hashPassword($password)
  {
    return sha1($password);
  }
}
