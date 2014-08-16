<?php

/**
 * examination actions.
 *
 * @package    devcup2014
 * @subpackage examination
 * @author     kncapara@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class examinationActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeNewExam(sfWebRequest $request)
  {
    // $this->forward('default', 'module');
  }

  public function executeGetPage(sfWebRequest $request)
  {
    $page = $request->getParameter('page');
		switch ($page) {
			case 'new':
				return $this->renderPartial('examination/new');
				break;

			case 'monitoring':
				return $this->renderPartial('examination/monitoring');
				break;

			case 'manage':
				return $this->renderPartial('examination/manage');
				break;

			case 'schedules':
				return $this->renderPartial('examination/schedules');
				break;
			
			default:
				# code...
				break;
		}

  }
}
