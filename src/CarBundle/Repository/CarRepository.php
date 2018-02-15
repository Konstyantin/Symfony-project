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
        $query = $this->createQueryBuilder('c')
            ->join('CarBundle:Dynamics', 'd', 'WITH', 'c.dynamics = d.id')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $query->getOneOrNullResult();
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
        $query = $this->createQueryBuilder('c')
            ->join('CarBundle:Fuel', 'f', 'WITH', 'c.fuel = f.id')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * Get cars by model
     *
     * Get car list item by model item
     *
     * @param string $model
     * @return array
     */
    public function getCarsByModel(string $model)
    {
        $query = $this->createQueryBuilder('c')
            ->join('CarBundle:Model', 'm', 'WITH', 'c.model = m.id')
            ->where('m.name =:model')
            ->setParameter('model', $model)
            ->getQuery();

        return $query->getResult();
    }

    /**
     * Get item model car
     *
     * Get car item by model name and car item name
     *
     * @param string $model
     * @param string $carName
     * @return array
     */
    public function getItemModelCar(string $model, string $carName)
    {
        $query = $this->createQueryBuilder('c')
            ->join('CarBundle:Model', 'm', 'WITH', 'c.model = m.id')
            ->where('m.name =:model')
            ->andwhere('c.name =:carName')
            ->setParameter('model', $model)
            ->setParameter('carName', $carName)
            ->getQuery();


        return $query->getOneOrNullResult();
    }

    /**
     * Get available car list
     *
     * Get car items list which is available
     *
     * @return array
     */
    public function getAvailableCarList()
    {
        $query = $this->createQueryBuilder('c')
            ->join('CarBundle:Model', 'm', 'WITH', 'c.model = m.id')
            ->where('c.available = 1')
            ->getQuery();

        return $query->getResult();
    }

    /**
     * Get car by user id
     *
     * Get car list query by user id
     *
     * @param $userId
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getCarsByUserId($userId)
    {
        $query = $this->createQueryBuilder('car');
        $query = ($userId) ? $query->join('AppBundle:UserCar', 'user_car', 'WITH', 'car.id = user_car.car')
            ->where('user_car.user =:userId')
            ->setParameter('userId', $userId) : $query;

        $query->orderBy('car.id', 'ASC');

        return $query;
    }
}
