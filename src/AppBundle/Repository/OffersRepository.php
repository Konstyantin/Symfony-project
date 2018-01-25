<?php

namespace AppBundle\Repository;

/**
 * OffersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OffersRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Get offers list
     *
     * Get all offers item list
     *
     * @return array
     */
    public function getOffersList()
    {
        $query = $this->createQueryBuilder('offers')
            ->getQuery();

        return $query->getResult();
    }
}
