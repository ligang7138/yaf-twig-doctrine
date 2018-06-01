<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-6-1
 * Time: 上午10:02
 */
use Doctrine\ORM\Mapping as ORM;
class UserModel
{
	/**
	 * @var integer
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 * @ORM\Column(name="id",type="integer",nullable=false,)
	 */
	private $id;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=45, nullable=false)
	 */
	private $name;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 * @return UserModel
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return UserModel
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}




}