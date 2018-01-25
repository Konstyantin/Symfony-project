<?php

namespace DealerBundle\Repository;

/**
 * DealerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DealerRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Get dealer list
     *
     * Get all dealer list item
     *
     * @return array
     */
    public function getDealerList()
    {
        $query = $this->createQueryBuilder('d')
            ->getQuery();

        return $query->getResult();
    }

}
