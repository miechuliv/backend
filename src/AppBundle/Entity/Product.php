<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProductRepository")
 */
class Product
{
	/**
     * @ORM\ManyToMany(targetEntity="Person", mappedBy="likedProducts")
     **/
    private $peopleWhoLikeThis;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text")
     */
    private $info;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="public_date", type="date")
     */
    private $publicDate;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set info
     *
     * @param string $info
     * @return Product
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set publicDate
     *
     * @param \DateTime $publicDate
     * @return Product
     */
    public function setPublicDate($publicDate)
    {
        $this->publicDate = $publicDate;

        return $this;
    }

    /**
     * Get publicDate
     *
     * @return \DateTime 
     */
    public function getPublicDate()
    {
        return $this->publicDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->peopleWhoLikeThis = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add peopleWhoLikeThis
     *
     * @param \AppBundle\Entity\Person $peopleWhoLikeThis
     * @return Product
     */
    public function addPeopleWhoLikeThi(\AppBundle\Entity\Person $peopleWhoLikeThis)
    {
        $this->peopleWhoLikeThis[] = $peopleWhoLikeThis;

        return $this;
    }

    /**
     * Remove peopleWhoLikeThis
     *
     * @param \AppBundle\Entity\Person $peopleWhoLikeThis
     */
    public function removePeopleWhoLikeThi(\AppBundle\Entity\Person $peopleWhoLikeThis)
    {
        $this->peopleWhoLikeThis->removeElement($peopleWhoLikeThis);
    }

    /**
     * Get peopleWhoLikeThis
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPeopleWhoLikeThis()
    {
        return $this->peopleWhoLikeThis;
    }
}
