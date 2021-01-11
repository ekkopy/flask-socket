<?php

use Src\Entity\Student;
use Src\Entity\Contact;
use Src\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$studentsRepository = $entityManager->getRepository(Student::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

/**
 *  Return a collection of students
 * 
 * @var Student[] $students
 */
$students = $studentsRepository->searchCoursesStudent();

foreach ($students as $student) {

    $contact = $student->getContact()->map(
        function (Contact $contact) {
            return $contact->getContact();
        }
    )->toArray();

    echo "ID: {$student->getId()}\nName: {$student->getName()}\nContact:" . implode(', ', $contact) . PHP_EOL;

    $courses = $student->getCourses();

    foreach ($courses as $course) {
        echo "\tID course: {$course->getId()}\n\tName: {$course->getName()}\n\n";
    }
    echo PHP_EOL;
}

foreach ($debugStack->queries as $queryInfo) {
    echo $queryInfo['sql'] . PHP_EOL;
}
