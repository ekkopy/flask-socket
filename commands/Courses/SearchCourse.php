<?php

use Src\Entity\Course;
use Src\Helper\EntityManagerFactory;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$courseRepository = $entityManager->getRepository(Course::class);

/** @var Course[] $courseList */
$courseList = $courseRepository->findAll();

foreach ($courseList as $course) {
    
    echo "[*] ID: " . $course->getId() . PHP_EOL;
    echo "[*] Course: " . $course->getName() . PHP_EOL;
    
    echo "\n\n";
}
