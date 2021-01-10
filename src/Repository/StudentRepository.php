<?php

namespace Src\Repository;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;
use Src\Entity\Student;

class StudentRepository extends EntityRepository
{

    public function searchCoursesStudent(): Collection
    {
        $studentClass = Student::class;
        $entityManager = $this->getEntityManager();
        $dql = "SELECT s, con, cour 
            FROM $studentClass s 
            JOIN student._contacts con 
            JOIN student._courses cour"; 
        $query = $entityManager->createQuery($dql);

        return $query->getResult();
    }
}
