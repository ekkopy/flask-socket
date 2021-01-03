<?php

namespace Src\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * All courses of students can do
 * 
 * @Entity Course
 */
class Course
{
    /**
     * Course id
     * 
     * @Id
     * @GeneratedValue
     * @Column(type="integer", name="id")
     */
    private $_id;

    /**
     * Couse name
     * 
     * @Column(type="string", name="name", length=50)
     */
    private $_name;

    /**
     * ManyToMany identifier of Students
     * 
     * @ManyToMany(targetEntity="Student", inversedBy="_courses")
     */
    private $_students;

    public function __construct()
    {
        $this->_students = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->_name = $name;
        return $this;
    }

    public function addStudent(Student $student): self
    {
        if ($this->_students->contains($student)) {
            return $this;
        }
     
        $this->_students->add($student);
        $student->addCourse($this);
        return $this;
    }

    public function getStudent(): ArrayCollection
    {
        return $this->_students;
    }
}
