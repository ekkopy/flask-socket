<?php

use Src\Entity\Student;
use Src\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

if (isset($argv[1]))
{
    /** @var Student[] $studentlist */
    $studentList = $studentRepository->find($argv[1]);
    
    echo "[*] ID: {$studentList->getId()}\nName: {$studentList->getName()}\n\n";

    exit();
}

/** @var Student[] $studentlist */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    echo "[*] ID: {$student->getId()}\nName: {$student->getName()}\n\n";
}
