<?php

use Src\Entity\Student;
use Src\Helper\EntityManagerFactory;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/**
 * Return Students total
 * 
 * @var Student[]  $students
 */
$studentsTotal = $studentRepository->getStudentsTotal();

echo "[*] Total of students: " . $studentsTotal . PHP_EOL;
