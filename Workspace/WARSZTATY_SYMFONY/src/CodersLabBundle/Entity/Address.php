<?php

namespace CodersLabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="CodersLabBundle\Repository\AddressRepository")
 */
class Address
{
  /**
  *@ORM\OneToOne(targetEntity="Contact", mappedBy="address") //Contact jest ważniejszy
  *
  */
    private $contact;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="fullAddress", type="text")
     */
    private $fullAddress;


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
     * Set fullAddress
     *
     * @param string $fullAddress
     * @return Address
     */
    public function setFullAddress($fullAddress)
    {
        $this->fullAddress = $fullAddress;

        return $this;
    }

    /**
     * Get fullAddress
     *
     * @return string
     */
    public function getFullAddress()
    {
        return $this->fullAddress;
    }

    /**
     * Set contact
     *
     * @param \CodersLabBundle\Entity\Contact $contact
     * @return Address
     */
    public function setContact(\CodersLabBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \CodersLabBundle\Entity\Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }
}
