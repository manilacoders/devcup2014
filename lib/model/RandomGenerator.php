<?php

class RandomGenerator
{
  private $token;

  public function setToken($token)
  {
    $this->token = $token;
    return $this;
  }

  public function getCrypt()
  {
    return md5($this->token . microtime()); 
  }
}