<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
class Bootstrap extends Yaf_Bootstrap_Abstract
{

	private $config;
	private $dbConfig;

	public function _initVendor()
	{
		require __DIR__.'/../vendor/autoload.php';
		$this->config   = Yaf_Application::app()->getConfig()->application->toArray();
		$this->dbConfig = Yaf_Application::app()->getConfig()->database->toArray();
	}

	public function _initTwig(Yaf_Dispatcher $dispatcher)
	{
		$config = Yaf_Application::app()->getConfig()->application->toArray();
		if(isset($config['twig']['enable']) && $config['twig']['enable']){
			$dispatcher->disableView();
			$viewPath = isset($config['twig']['views_path'])?$config['twig']['views_path']:APP_PATH.'/application/views/';
			$dispatcher->setView(
				new TemplateAdapter($viewPath, $config)
			);
		}
	}

	/**
	 * 整合orm
	 */
	public function _initDoctrine(){
		$isDevMode = true;
		$paths = APP_PATH."/application/entities";
//		$config = Setup::createAnnotationMetadataConfiguration(array(APP_PATH."/application/models"), $isDevMode);

		$config = Setup::createConfiguration($isDevMode);
		$driver = new AnnotationDriver(new AnnotationReader(), $paths);

// registering noop annotation autoloader - allow all annotations by default
		AnnotationRegistry::registerLoader('class_exists');
		$config->setMetadataDriverImpl($driver);

		$conn = array(
			'host' => $this->dbConfig['master']['host'],
			'port' => $this->dbConfig['master']['port'],
			'driver' => $this->dbConfig['master']['driver'],
			'user'     => $this->dbConfig['master']['user'],
			'password' => $this->dbConfig['master']['password'],
			'dbname'   => $this->dbConfig['master']['dbname']
		);

		// obtaining the entity manager
		$entityManager = EntityManager::create($conn, $config);
		Yaf_Registry::set('doctrine' , $entityManager);
	}

}