<?php

class registerAction extends sfAction
{
  public function execute($request)
  {
    $post = $request->getPostParameters();

    if ($request->isMethod(sfRequest::POST)) {
      $crypt = new RandomGenerator;
      $rand_text = $crypt->setToken(sfConfig::get('app_random_token'))->getCrypt();

      // TODO: save the token to Profiles Field
      // TODO: save the $post to Profiles
      // TODO: send email;

      $message = "Please click the link: http://www.google.com/" . $rand_text;
      $this->getMailer()->composeAndSend(sfConfig::get('app_email_noreply'), $post['email'], 'Subject', $message);
    }

  }
}