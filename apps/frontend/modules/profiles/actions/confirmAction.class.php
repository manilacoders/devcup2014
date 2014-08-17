<?php 

/**
* 
* @author Kenn Capara
*/
class confirmAction extends sfActions
{
  /**
   * Executes  action
   *
   * @param sfWebRequest  A request object
   **/
  public function execute($request)
  {
    $email_token = $request->getParameter('email_token');
    if (! $email_token) {
      // TODO route to page error in the future.
      throw new Exception("Confirmation key is invalid.");
    }

    try {
      Doctrine_Manager::connection()->beginTransaction();
     
      $profile = ProfileTable::getInstance()->findOneByEmailToken($email_token);
      if (! $profile) {
        throw new Exception("Confirmation key is invalid.");
      }

      if (! $profile->getIsActive()) {
        $profile
          ->setIsActive(true)
          ->save();
      } else {
        $this->redirect('@dashboard');
      }
     
      Doctrine_Manager::connection()->commit();
    } catch (Exception $e) {
      Doctrine_Manager::connection()->rollback();
      throw $e;
    }
  }
}