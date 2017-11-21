<?php

namespace CarBundle\Repository;

/**
 * CarRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CarRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Get body data
     *
     * Return body data by car id
     *
     * @param int $id
     * @return mixed
     */
    public function getBodyData($id)
    {
        $query = $this->createQueryBuilder('c')
            ->join('CarBundle:Body', 'b', 'WITH', 'c.body = b.id')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * Get dynamics data
     *
     * Return dynamics data by car id
     *
     * @param int $id
     * @return mixed
     */
    public function getDynamicsData($id)
    {
//        $query = $this->createQueryBuilder('c')
//            ->join('CarBundle:Dynamics', 'd', 'WITH', 'c.dynamics = d.id')
//            ->where('c.id = :id')
//            ->setParameter('id', $id)
//            ->getQuery();
//
//        return $query->getOneOrNullResult();
    }

    /**
     * Get fuel data
     *
     * Return fuel data by car id
     *
     * @param int $id
     * @return mixed
     */
    public function getFuelData($id)
    {
//        $query = $this->createQueryBuilder('c')
//            ->join('CarBundle:Fuel', 'f', 'WITH', 'c.fuel = f.id')
//            ->where('c.id = :id')
//            ->setParameter('id', $id)
//            ->getQuery();
//
//        return $query->getOneOrNullResult();
    }
}
