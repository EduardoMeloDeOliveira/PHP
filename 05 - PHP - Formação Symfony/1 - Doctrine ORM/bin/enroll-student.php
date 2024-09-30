<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Student;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = \Alura\Doctrine\Helper\EntityManagerCreator::createEntityManager();


$studentId = $argv[1];
$courseId = $argv[2];

$student = $entityManager->find(Student::class, $studentId);
$course = $entityManager->find(Course::class, $courseId);

$student->enrollInCourse($course);

$entityManager->flush();