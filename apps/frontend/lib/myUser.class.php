<?php

class myUser extends sfBasicSecurityUser
{
  /**
   * Short Description here.
   *
   * @author Kenn Capara
   * @return void
   */
  public function getName()
  {
    return $this->getAttribute('user')->getFirstName() . ' ' . $this->getAttribute('user')->getLastName();
  }

  /**
   * Short Description here.
   *
   * @author Kenn Capara
   * @return void
   */
  public function getFirstName()
  {
    return $this->getAttribute('user')->getFirstName();
  }

  /**
   * Short Description here.
   *
   * @author Kenn Capara
   * @return void
   */
  public function getLastName()
  {
    return $this->getAttribute('user')->getLastName();
  }

  /**
   * Short Description here.
   *
   * @author Kenn Capara
   * @return void
   */
  public function getEmail()
  {
    return $this->getAttribute('user')->getEmail();
  }
}
