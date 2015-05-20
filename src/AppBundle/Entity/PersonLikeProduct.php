<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonLikeProduct
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PersonLikeProductRepository")
 */
class PersonLikeProduct
{
    
    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="likes", cascade={"persist"})
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     **/
    private $person;
    
    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="likes", cascade={"persist"})
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     **/
    private $product;
    
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
     * Set person
     *
     * @param \AppBundle\Entity\Person $person
     * @return PersonLikeProduct
     */
    public function setPerson(\AppBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \AppBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     * @return PersonLikeProduct
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
