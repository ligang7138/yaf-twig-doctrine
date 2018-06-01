<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-5-31
 * Time: 上午9:26
 */

class BaseController extends Yaf_Controller_Abstract{

	protected function init(){
		$this->preDispatch($this->_request);
	}

	protected function display($tpl, array $var_array = null)
	{
		$tpl = $this->removePathSuffix($tpl);
		$tplArr = explode('/',$tpl);
		$ext = Yaf_Application::app()->getConfig()->application->view->ext;
		if(count($tplArr) == 3 && $this->hasModule()){
//			$viewScriptPath = APP_PATH."/application/modules/{$tplArr[0]}/views";
//			$this->setViewPath($viewScriptPath); // 设置模板的文件寻找路径
			$tpl = "{$tplArr[1]}/{$tplArr[2]}".'.'.$ext;
		}elseif(count($tplArr) == 2){
//			$viewScriptPath = APP_PATH . "/application/views";
//			$this->setViewPath($viewScriptPath);
			$tpl = "{$tplArr[0]}/{$tplArr[1]}".'.'.$ext;
		}else{
			$controller = strtolower($this->_request->getControllerName());
			$tpl = "{$controller}/{$tplArr[0]}".'.'.$ext;
		}
		$this->getView()->display($tpl, $var_array);
		return false;
	}

	/**
	 * 去除文件路径后缀名
	 * @param string $path
	 * @return string
	 */
	protected function removePathSuffix(string $path) : string{
		return strpos($path,'.') === false ? $path : substr($path, 0,strpos($path,'.'));
	}

	/**
	 * 判断当前module是否是合法的
	 * @param Yaf_Request_Abstract $request
	 * @return bool
	 */
	public function hasModule(Yaf_Request_Abstract $request){
		$modules = Yaf_Application::app()->getModules();
		// 获取request_uri进行路由分析
		$request_uri = trim($request->getRequestUri(),'/');
		$request_uri_arr = explode('/',$request_uri);
		return in_array(ucwords($request_uri_arr[0]),$modules);
	}

	/**
	 * 在分发器执行分发动作之前将模板的文件寻找路径改掉
	 * @param Yaf_Request_Abstract $request
	 */
	public function preDispatch (Yaf_Request_Abstract $request)
	{
		$config = Yaf_Application::app()->getConfig()->application->toArray();
		$modules = Yaf_Application::app()->getModules();
		// 获取request_uri进行路由分析
		$request_uri = trim($request->getRequestUri(),'/');
		$request_uri_arr = explode('/',$request_uri);
		if(in_array(ucwords($request_uri_arr[0]),$modules)){
			$moduleName = $request_uri_arr[0];
		}else{
			if(isset($config['dispatcher']['defaultModule'])){
				$moduleName = $config['dispatcher']['defaultModule'];
			}else{
				$moduleName = 'index';
			}
		}
		$moduleName = ucwords($moduleName);
		$viewScriptPath = APP_PATH . '/application/';
		if($moduleName != 'Index'){
			$viewScriptPath .= 'modules/' . $moduleName . '/views';
		}else {
			$viewScriptPath = $this->getViewPath();
		}

		$this->setViewPath($viewScriptPath);
	}
}