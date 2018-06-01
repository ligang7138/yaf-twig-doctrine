<?php

class TemplateAdapter implements Yaf_View_Interface
{
	/**
	 * @var \Twig_Loader_Filesystem
	 */
	protected $loader;

	/**
	 * @var \Twig_Environment
	 */
	protected $twig;

	/**
	 * @var array
	 */
	protected $variables = array();

	/**
	 * @param string $templateDir
	 * @param array  $options
	 */
	public function __construct($templateDir, array $options = array())
	{
		$this->loader = new Twig_Loader_Filesystem($templateDir);
		$this->twig   = new Twig_Environment($this->loader, $options);
	}

	/**
	 * (Yaf >= 2.2.9)
	 * 传递变量到模板
	 *
	 * 当只有一个参数时，参数必须是Array类型，可以展开多个模板变量
	 *
	 * @param string $name 变量名
	 * @param string $value 变量值
	 *
	 * @return Boolean
	 */
	public function assign($name, $value = null)
	{
		$this->variables[$name] = $value;
	}

	/**
	 * (Yaf >= 2.2.9)
	 * 渲染模板并直接输出
	 *
	 * @param string $tpl 模板文件名
	 * @param array $var_array 模板变量
	 *
	 * @return Boolean
	 */
	public function display($tpl, $var_array = null)
	{
		echo $this->render($tpl,$var_array);
	}

	/**
	 * (Yaf >= 2.2.9)
	 * 渲染模板并返回结果
	 *
	 * @param string $tpl 模板文件名
	 * @param array $var_array 模板变量
	 *
	 * @return String
	 */
	public function render($tpl, $var_array = array())
	{
		if (is_array($var_array)){
			$this->variables = array_merge($this->variables, $var_array);
		}
		return $this->twig->loadTemplate($tpl)->display($this->variables);
	}

	/**
	 * (Yaf >= 2.2.9)
	 * 获取模板目录文件
	 *
	 * @return String
	 */
	public function getScriptPath()
	{
		return $this->loader->getPaths();
	}


	/**
	 * @param string $templateDir
	 * @return void
	 */
	public function setScriptPath($templateDir)
	{
		$this->loader->setPaths($templateDir);
	}
}