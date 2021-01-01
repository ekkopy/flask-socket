<?php

/**
 * Contact's of student
 * php version 7.3.25
 * 
 * @category PHP
 * @package  PHP
 * @author   Thiago Martins <thiagom.devsec@gmail.com>
 * @license  Mozilla https://opensource.org/licenses/MPL-2.0
 * @link     https://github.com/yassuke/doc-crud
 */

namespace Src\Entity;

/**
 * Contact's of student
 * php version 7.3.25
 * 
 * @Entity Contact
 * 
 * @category PHP
 * @package  PHP
 * @author   Thiago Martins <thiagom.devsec@gmail.com>
 * @license  Mozilla https://opensource.org/licenses/MPL-2.0
 * @link     https://github.com/yassuke/doc-crud
 */
class Contact
{

    /**
     * Student's contact id 
     * 
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $_id;

    /**
     * Student's cellphone
     * 
     * @Column(type="string")
     */
    private $_cellphone;

    /**
     * Student's fk
     * 
     * @ManyToOne(targetEntity="Student")
     */
    private $_student;

    /**
     * Return id of student's contact
     * 
     * @return int $_id
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * Return the cellphone number of student's 
     * 
     * @return string $_cellphone
     */
    public function getContact(): string
    {
        return $this->_cellphone;
    }

    /**
     * Set the cellphone contact of students
     * 
     * @param string $cellphone - Student's contact number
     * 
     * @return self contact
     */
    public function setContact(string $cellphone): self
    {
        $this->_cellphone = $cellphone;
        return $this;
    }

    /**
     * SRelation with Student's table
     * 
     * @return Student $_student
     */
    public function getStudent(): Student
    {
        return $this->_student;
    }

    /**
     * Set the cellphone contact to students tabled
     * 
     * @param Student $student - Student's object
     * 
     * @return self $student
     */
    public function setStudent(student $student): self
    {
        $this->_student = $student;
        return $this;
    }
}
