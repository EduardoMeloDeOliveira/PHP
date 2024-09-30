<?php

namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Student;
use Doctrine\ORM\EntityRepository;

class DoctrineStudentRepository extends EntityRepository
{

    public function studentsAndCourses(): array
    {
        return $this->createQueryBuilder('student')
            ->addSelect('phones')
            ->addSelect('courses')
            ->leftJoin('student.phones', 'phones')  // Ajuste para usar 'phones'
            ->leftJoin('student.courses', 'courses') // Ajuste para usar 'courses'
            ->getQuery()
            ->enableResultCache(86400)
            ->getResult();
    }


}