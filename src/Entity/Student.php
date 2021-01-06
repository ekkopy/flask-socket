<?php

namespace Src\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity Student
 * 
 */
class Student
{
    /**
     * Student id
     * 
     * @Id
     * @GeneratedValue
     * @Column(type="integer", name="id")
     */
    private $_id;

    /**
     * Student name
     * 
     * @Column(type="string", name="name")
     */
    private $_name;

    /** 
     * Student's contacts
     * 
     * @OneToMany(targetEntity="Contact", mappedBy="_student", 
     *            cascade={"remove", "persist"}, fetch="EAGER")
     */
    private $_contacts;
    
    /** 
     * Student's contacts
     * 
     * @ManyToMany(targetEntity="Course", mappedBy="_students")
     */
    private $_courses;

    public function __construct()
    {
        $this->_contacts = new ArrayCollection();
        $this->_courses = new ArrayCollection();
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

    public function addCourse(Course $course): self
    {
        if ($this->_courses->contains($course)) {
            return $this;
        }
        
        $this->_courses->add($course);
        $course->addStudent($this);
        return $this;
    }

    /**
     * @return Course[]
     */
    public function getCourses(): Collection
    {
        return $this->_courses;
    }

}
