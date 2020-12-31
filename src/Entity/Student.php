<?php

namespace Src\Entity;

/**
 * @Entity
 * 
 */
class Student
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $_id;

    /**
     * @Column(type="string")
     */
    private $_name;

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
}
