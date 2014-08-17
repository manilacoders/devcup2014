<?php

/**
 * subjects actions.
 *
 * @package    devcup2014
 * @subpackage subjects
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class subjectsActions extends sfActions
{
  /**
   * Executes CreateNew action
   *
   * @param sfWebRequest  A request object
   **/
  public function executeCreateNew(sfWebRequest $request)
  {
    $user = $this->getUser();

    $name = $request->getParameter('subject');
    if (! $name) {
      throw new Exception("Subject parameter is required.");
    }

    try {
      Doctrine_Manager::connection()->beginTransaction();

      $profile = ProfileTable::getInstance()->findOneById($user->getAttribute('user')->getId());

      $subject = SubjectTable::getInstance()->findOneByProfileIdAndName($profile->getId(), $name);
      if ($subject) {
        throw new Exception("Subject already exist.");
      }
     
      $subject = new Subject;
      $subject
        ->setName($name)
        ->setProfile($profile)
        ->save();
     
      Doctrine_Manager::connection()->commit();

    } catch (Exception $e) {
      Doctrine_Manager::connection()->rollback();
      throw $e;
    }
  }
}
