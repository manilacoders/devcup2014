<?php

class SecurityFilter extends sfBasicSecurityFilter
{
  /**
   * Forbidden
   *
   * @throws Exception
   */
  protected function forwardToSecureAction()
  {    
    $this->context->getResponse()->setStatusCode(403);
    throw new Exception("Access Denied", 403);
  }

  /**
   * Unauthorized
   *
   * @throws Exception
   */
  protected function forwardToLoginAction()
  {
    $this->context->getResponse()->setStatusCode(401);
    throw new Exception("Login Required", 401);
  }
}
