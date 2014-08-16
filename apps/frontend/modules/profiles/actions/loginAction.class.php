<?php 

/**
* 
* @author Kenn Capara
*/
class loginAction extends sfActions
{
  /**
   * Executes  action
   *
   * @param sfWebRequest  A request object
   **/
  public function execute(sfWebRequest $request)
  {
    $post = $request->getPostParameters();
    echo "<pre>";
    print_r($post); exit; 
  }
}