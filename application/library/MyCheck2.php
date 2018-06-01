<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * MyCheck2
 *
 * @ORM\Table(name="my_check_2", uniqueConstraints={@ORM\UniqueConstraint(name="Index_check2_b_id", columns={"b_id"})})
 * @ORM\Entity
 */
class MyCheck2
{
    /**
     * @var string
     *
     * @ORM\Column(name="a_name", type="string", length=45, nullable=false)
     */
    private $aName = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="c2_add_time", type="datetime", nullable=false)
     */
    private $c2AddTime;

    /**
     * @var string
     *
     * @ORM\Column(name="c2_proposal_amt", type="decimal", precision=13, scale=2, nullable=false)
     */
    private $c2ProposalAmt = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="c2_opinion", type="string", length=600, nullable=false)
     */
    private $c2Opinion = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="c2_check_time", type="datetime", nullable=true)
     */
    private $c2CheckTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="c2_change_pid", type="integer", nullable=true)
     */
    private $c2ChangePid = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="b_id", type="integer", nullable=false)
     */
    private $bId = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="c2_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $c2Id = 0;



    /**
     * Set aName
     *
     * @param string $aName
     *
     * @return MyCheck
     */
    public function setAName($aName)
    {
        $this->aName = $aName;

        return $this;
    }

    /**
     * Get aName
     *
     * @return string
     */
    public function getAName()
    {
        return $this->aName;
    }

    /**
     * Set c2AddTime
     *
     * @param \DateTime $c2AddTime
     *
     * @return MyCheck
     */
    public function setC2AddTime($c2AddTime)
    {
        $this->c2AddTime = $c2AddTime;

        return $this;
    }

    /**
     * Get c2AddTime
     *
     * @return \DateTime
     */
    public function getC2AddTime()
    {
        return $this->c2AddTime;
    }

    /**
     * Set c2ProposalAmt
     *
     * @param string $c2ProposalAmt
     *
     * @return MyCheck
     */
    public function setC2ProposalAmt($c2ProposalAmt)
    {
        $this->c2ProposalAmt = $c2ProposalAmt;

        return $this;
    }

    /**
     * Get c2ProposalAmt
     *
     * @return string
     */
    public function getC2ProposalAmt()
    {
        return $this->c2ProposalAmt;
    }

    /**
     * Set c2Opinion
     *
     * @param string $c2Opinion
     *
     * @return MyCheck
     */
    public function setC2Opinion($c2Opinion)
    {
        $this->c2Opinion = $c2Opinion;

        return $this;
    }

    /**
     * Get c2Opinion
     *
     * @return string
     */
    public function getC2Opinion()
    {
        return $this->c2Opinion;
    }

    /**
     * Set c2CheckTime
     *
     * @param \DateTime $c2CheckTime
     *
     * @return MyCheck
     */
    public function setC2CheckTime($c2CheckTime)
    {
        $this->c2CheckTime = $c2CheckTime;

        return $this;
    }

    /**
     * Get c2CheckTime
     *
     * @return \DateTime
     */
    public function getC2CheckTime()
    {
        return $this->c2CheckTime;
    }

    /**
     * Set c2ChangePid
     *
     * @param integer $c2ChangePid
     *
     * @return MyCheck
     */
    public function setC2ChangePid($c2ChangePid)
    {
        $this->c2ChangePid = $c2ChangePid;

        return $this;
    }

    /**
     * Get c2ChangePid
     *
     * @return integer
     */
    public function getC2ChangePid()
    {
        return $this->c2ChangePid;
    }

    /**
     * Set bId
     *
     * @param integer $bId
     *
     * @return MyCheck
     */
    public function setBId($bId)
    {
        $this->bId = $bId;

        return $this;
    }

    /**
     * Get bId
     *
     * @return integer
     */
    public function getBId()
    {
        return $this->bId;
    }

    /**
     * Get c2Id
     *
     * @return integer
     */
    public function getC2Id()
    {
        return $this->c2Id;
    }

    public function setC2Id($c2Id){
    	$this->c2Id = $c2Id;
    	return $this;
    }
}
