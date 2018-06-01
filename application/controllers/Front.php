<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-5-31
 * Time: 下午1:36
 */

class FrontController extends BaseController
{
	public function indexAction(){
		Yaf_Dispatcher::getInstance()->disableView();
		echo 'front->index';die;
	}

	public function userAction()
	{
		echo 'front->user';
	}
}