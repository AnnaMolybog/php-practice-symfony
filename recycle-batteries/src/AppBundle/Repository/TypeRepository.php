<?php

namespace AppBundle\Repository;

/**
 * TypeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TypeRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return array
     */
    public function getTypesList()
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('t')
            ->from($this->getEntityName(), 't')
            ->getQuery()
            ->getResult();
    }
}
