<?php

class registerAction extends sfAction
{
  public function execute($request)
  {
    $post = $request->getPostParameters();
    if ($request->isMethod(sfRequest::POST)) {

      $profile = ProfileTable::getInstance()->findOneByEmail($post['email']);
      if ($profile) {
        throw new Exception("Email address {$post['email']} is already registered.");
      }

      try {
        Doctrine_Manager::connection()->beginTransaction();

        // $profile = ProfileTable::getInstance()->findOneByEmail($post['email']);
        // if ($profile) {
        //   throw new Exception("Account is already registered.");
        // }
       
        $profile = new Profile;
        $profile->fromArray($post);
        $profile
          ->setType(Profile::TYPE_TEACHER)
          ->save();

        $this->sendConfirmation($profile);

        Doctrine_Manager::connection()->commit();
      } catch (Exception $e) {
        Doctrine_Manager::connection()->rollback();
        throw $e;
      }

      $this->redirect('@forConfirmation');
    }
  }

  /**
   * Short Description here.
   *
   * @author Kenn Capara
   * @return void
   */
  public function sendConfirmation($profile)
  {
    $body = $this->getPartial('emails/confirmation', array(
      'profile' => $profile->toArray()
    ));

    $message = $this->getMailer()
      ->compose(sfConfig::get('app_email_sender'), $profile->getEmail(), 'GURO Account Confirmation', $body);
    
    $message->setContentType('text/html');
    
    return $this->getMailer()->send($message);
  }
}