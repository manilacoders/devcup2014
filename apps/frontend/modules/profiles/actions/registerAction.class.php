<?php

class registerAction extends sfAction
{
  public function execute($request)
  {
    $post = $request->getPostParameters();

    if ($request->isMethod(sfRequest::POST)) {
      $crypt = new RandomGenerator;
      $rand_text = $crypt->setToken(sfConfig::get('app_random_token'))->getCrypt();

      $profile = new Profile;
      $profile
        ->setType(Profile::TYPE_TEACHER)
        ->setFirstName($post['f_name'])
        ->setLastName($post['l_name'])
        ->setEmail($post['email'])
        ->setIsActive(false)
        ->setEmailToken($rand_text)
        ->save(); 

      $message = "Please click the link: http://www.google.com/" . $rand_text;
      $this->getMailer()->composeAndSend(sfConfig::get('app_email_noreply'), $post['email'], 'Subject', $message);
    }

  }
}