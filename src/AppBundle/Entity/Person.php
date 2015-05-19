<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PersonRepository")
 */
class Person
{
	/**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="peopleWhoLikeThis")
     * @ORM\JoinTable(name="people_like_product")
     **/
    private $likedProducts;
	
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
     * @ORM\Column(name="login", type="string", length=10)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="l_name", type="string", length=100)
     */
    private $lName;

    /**
     * @var string
     *
     * @ORM\Column(name="f_name", type="string", length=100)
     */
    private $fName;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="smallint")
     */
    private $state;


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
     * Set login
     *
     * @param string $login
     * @return Person
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set lName
     *
     * @param string $lName
     * @return Person
     */
    public function setLName($lName)
    {
        $this->lName = $lName;

        return $this;
    }

    /**
     * Get lName
     *
     * @return string 
     */
    public function getLName()
    {
        return $this->lName;
    }

    /**
     * Set fName
     *
     * @param string $fName
     * @return Person
     */
    public function setFName($fName)
    {
        $this->fName = $fName;

        return $this;
    }

    /**
     * Get fName
     *
     * @return string 
     */
    public function getFName()
    {
        return $this->fName;
    }

    /**
     * Set state
     *
     * @param integer $state
     * @return Person
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->likedProducts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add likedProducts
     *
     * @param \AppBundle\Entity\Product $likedProducts
     * @return Person
     */
    public function addLikedProduct(\AppBundle\Entity\Product $likedProducts)
    {
        $this->likedProducts[] = $likedProducts;

        return $this;
    }

    /**
     * Remove likedProducts
     *
     * @param \AppBundle\Entity\Product $likedProducts
     */
    public function removeLikedProduct(\AppBundle\Entity\Product $likedProducts)
    {
        $this->likedProducts->removeElement($likedProducts);
    }

    /**
     * Get likedProducts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLikedProducts()
    {
        return $this->likedProducts;
    }
}
