<?php

namespace Src\Repository;

use Doctrine\ORM\EntityRepository;
use Src\Entity\Student;

class StudentRepository extends EntityRepository
{
    public function searchCoursesStudent(): array
    {
        $studentClass = Student::class;
        $entityManager = $this->getEntityManager();
        $dql =   "SELECT students, contacts, courses 
            FROM $studentClass students 
            JOIN students._contacts contacts 
            JOIN students._courses courses"; 
        $query = $entityManager->createQuery($dql);

        return $query->getResult();
    }
}
