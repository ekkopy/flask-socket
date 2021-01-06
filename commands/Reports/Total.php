<?php

use Src\Entity\Student;
use Src\Helper\EntityManagerFactory;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$className = Student::class;

$dql = "SELECT count(s) FROM $className s";
$query = $entityManager->createQuery($dql);
$stundetsTotal = $query->getSingleScalarResult();

//$repository = $entityManager->getRepository(Student::class);
//$studentList  = $repository->findAll();

echo "[*] Total of students: " . $stundetsTotal;