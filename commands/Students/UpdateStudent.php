<?php

use Src\Entity\Student;
use Src\Helper\EntityManagerFactory;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentId = $argv[1];
$studentName = $argv[2];

$student = $entityManager->find(Student::class, $studentId);
$student->setName($studentName);

$entityManager->flush();
