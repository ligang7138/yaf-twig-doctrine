<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-5-31
 * Time: 上午10:52
 */

class UserController extends BaseController
{
	public function indexAction(){
		print_r($_GET);
		$this->display('index',[]);
	}
}