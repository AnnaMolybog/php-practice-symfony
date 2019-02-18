<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Batteries;

/**
 * BatteriesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BatteriesRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param Batteries $batteries
     * @return Batteries
     */
    public function save(Batteries $batteries)
    {
        $this->getEntityManager()->persist($batteries);
        $this->getEntityManager()->flush();

        return $batteries;
    }

    /**
     * @return array
     */
    public function getStatistic()
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('b as batteryObject, t, sum(b.count) as amount')
            ->from($this->getEntityName(), 'b')
            ->join('b.type', 't')
            ->groupBy('b.type')
            ->getQuery()
            ->getResult();
    }
}