<?php

use Src\Entity\Contact;
use Src\Entity\Student;
use Src\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$student = new Student();
$student->setName($argv[1]);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

for ($i = 2; $i < $argc; $i++) {
    $studentContact = $argv[$i];
    $contact = new Contact();
    $contact->setContact($studentContact);

    $student->addContact($contact);
}

$entityManager->persist($student);

$entityManager->flush();
