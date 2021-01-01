<?php

namespace Src\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 * 
 */
class Student
{
    /**
     * Student id
     * 
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $_id;

    /**
     * Student name
     * 
     * @Column(type="string")
     */
    private $_name;

    /** 
     * Student's contacts
     * 
     * @OneToMany(targetEntity="Contact", mappedBy="_student")
     */
    private $_contacts;

    public function __construct()
    {
        $this->_contacts = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->_id;   
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setName(string $name): self
    {
        $this->_name = $name;
        return $this;
    }

    public function addContact(Contact $cellphone): self
    {
        $this->_contacts->add($cellphone);
        $cellphone->setStudent($this);

        return $this;
    }

    public function getContact(): Collection
    {
        return $this->_contacts;
    }

}
