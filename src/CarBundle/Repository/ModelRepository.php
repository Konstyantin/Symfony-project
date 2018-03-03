<?php

namespace CarBundle\Repository;

/**
 * ModelRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ModelRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Get models list
     *
     * Get all model list which exists
     *
     * @return mixed
     */
    public function getModelsList()
    {
        $query = $this->createQueryBuilder('m')
            ->orderBy('m.name', 'DESC')
            ->getQuery();

        return $query->execute();
    }

    /**
     * Get Parent model
     *
     * Get Model list which don't have child model
     *
     * @return mixed
     */
    public function getParentModel()
    {
        $query = $this->createQueryBuilder('m')
            ->where('m.parent IS NULL')
            ->getQuery();

        return $query->execute();
    }

    /**
     * Get model by user id
     *
     * Get model list query by passed user id
     *
     * @param $userId
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getModelsByUserId($userId)
    {
        $query = $this->createQueryBuilder('model');

        $query = ($userId) ? $query
            ->join('UserBundle:UserCar', 'user_car', 'WITH', 'model.id = user_car.model')
            ->where('user_car.user =:userId')
            ->setParameter('userId', $userId) : $query;

        $query->orderBy('model.id', 'ASC');

        return $query;
    }

    /**
     * Get model by name
     *
     * Get model item by passed name param
     *
     * @param string $name
     * @return mixed
     */
    public function getModelByName(string $name)
    {
        $query = $this->createQueryBuilder('model')
            ->where('model.name =:name')
            ->setParameter('name', $name)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    public function searchModel(){}
}
