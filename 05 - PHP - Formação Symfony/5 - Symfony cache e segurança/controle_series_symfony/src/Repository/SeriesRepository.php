<?php

namespace App\Repository;

use App\Entity\Series;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Series>
 */
class SeriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Series::class);
    }


    public function save(Series $series, bool $flush = true)
    {
        $this->getEntityManager()->persist($series);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Series $series, bool $flush = true)
    {
        $this->getEntityManager()->remove($series);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findOneById(int $id): ?Series
    {
        return $this->getEntityManager()->getRepository(Series::class)->find($id);

    }

}
