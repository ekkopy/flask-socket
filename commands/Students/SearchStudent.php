<?php

use Src\Entity\Contact;
use Src\Entity\Student;
use Src\Helper\EntityManagerFactory;

require_once __DIR__ . '/../../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

if (isset($argv[1])) {
    /** 
     * Search with repository with specify $id
     * 
     * @var Student[] $studentList
     */
    $studentList = $studentRepository->find($argv[1]);

    exit();
}

/** 
 * Search all students
 * 
 * @var Student[] $studentList 
 */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {

    $contact = $student
        ->getContact()
        ->map(
            function (Contact $contact) {
                return $contact->getContact();
            }
        )
        ->toArray();
    echo "[*] ID: {$student->getId()}\nName: {$student->getName()}\n\n";
    echo "Contacts: " . implode(', ', $contact) . PHP_EOL;
}
