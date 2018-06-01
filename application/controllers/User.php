<?php



class UserController extends BaseController
{
    public function indexAction()
    {

    	/** @var \Doctrine\ORM\EntityManager $em */
    	$em = Yaf_Registry::get('doctrine');

//	    $em->getConnection()->executeQuery()

//	    $a = $em->getConnection()->executeQuery('select * from my_check_2 limit 2');

//	    print_r($a->fetchAll());die;
	    $myCheck2 = $em->find('MyCheck2',48);
print_r($myCheck2);die;
	    $query = $em->createQuery(
		    'SELECT * FROM MyCheck2');
	    $products = $query->getResult();
//    	$myCheck2 = $em->getRepository('MyCheck2');
//    	$myCheck2 = Yaf_Registry::get('doctrine')->getRepository('MyCheck2');
    	print_r($products);die;
    	echo $user->getName();
    	echo '------------'.PHP_EOL;
    	$user->setName('李刚');
	    echo $user->getName();die;
//    	print_r($this->_request);
//    	print_r($this->getRequest());die;
	    $a = $this->getRequest()->getQuery('a',0);

	    $name = $this->getRequest()->getPost('name',0);


		echo $a.'---'.$name;
    }
}