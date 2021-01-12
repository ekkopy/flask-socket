<?php

namespace Src\Repository;

use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository
{
    public function searchCoursesStudent(): array
    {
        $query = $this->createQueryBuilder('students')
            ->join('students._contacts', 'contacts')
            ->join('students._courses', 'courses')
            ->addSelect('contacts')
            ->addSelect('courses')
            ->getQuery();

        return $query->getResult();
    }

    public function getStudentsTotal(): string
    {
        return $this->createQueryBuilder('students')
            ->select('count(students)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
