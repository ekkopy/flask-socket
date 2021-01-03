<?php

use Src\Entity\Student;
use Src\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentId = $argv[1];
$student = $entityManager->getReference(Student::class, $studentId);

$entityManager->remove($student);
$entityManager->flush();
