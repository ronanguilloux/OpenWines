<?php
/**
 * Created by PhpStorm.
 * User: ronan
 * Date: 29/05/2014
 * Time: 17:45
 */

namespace OpenWines\WebAppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\QueryBuilder;

/**
 * Class RegionRepository
 * @package OpenWines\WebAppBundle\Repository
 */
class RegionRepository extends EntityRepository
{

    /**
     * used in DQL expressions
     */
    const QUERY_ALIAS = 'r';

    /**
     * findAllOrderByCreation
     *
     * @return ArrayCollection
     */
    public function findAllOrderByCreation()
    {
        return $this
            ->buildOrderByCreation()
            ->getQuery()
            ->execute();
        ;
    }

    /**
     * findAllOrderByName
     *
     * @return ArrayCollection
     */
    public function findAllOrderByName()
    {
        return $this
            ->buildOrderByName()
            ->getQuery()
            ->execute();
        ;
    }

    /**
     * findAllOrderByCreationLimitedBy
     *
     * @param int $limit 10
     *
     * @return ArrayCollection
     */
    public function findAllOrderByCreationLimitedBy($limit = 10)
    {
        $limit = (int)$limit > 0 ? (int)$limit : 1;

        return $this
            ->buildOrderByCreation()
            ->getQuery()
            ->setMaxResults($limit)
            ->execute()
            ;
    }


    /**
     * findAllOrderByCreationAndNamedLike
     *
     * @param string $name
     * @throws \InvalidArgumentException
     *
     * @return ArrayCollection
     */
    public function findAllOrderByCreationAndNamedLike($name)
    {

        if(empty($name)) {
            throw new \InvalidArgumentException("name parameter cannot be empty.");
        }
        $qb = $this->buildOrderByCreation();
        $qb = $this->buildByNameLike($name, $qb)
        ;

        return $qb
            ->getQuery()
            ->execute()
            ;
    }

    /**
     * buildOrderByCreation
     *
     * @param QueryBuilder $qb
     * @param string $direction
     *
     * @return QueryBuilder
     */
    private function buildOrderByCreation(QueryBuilder $qb = null, $direction = 'ASC')
    {
        if(null === $qb) {
            $qb = $this->createQueryBuilder(self::QUERY_ALIAS);
        }

        return $qb
            ->orderBy(sprintf("%s.createdAt", self::QUERY_ALIAS), $direction)
            ;
    }

    /**
     * buildOrderByName
     *
     * @param QueryBuilder $qb
     * @param string $direction
     *
     * @return QueryBuilder
     */
    private function buildOrderByName(QueryBuilder $qb = null, $direction = 'ASC')
    {
        if(null === $qb) {
            $qb = $this->createQueryBuilder(self::QUERY_ALIAS);
        }

        return $qb
            ->orderBy(sprintf("%s.name", self::QUERY_ALIAS), $direction)
            ;
    }

    /**
     * buildByNameLike
     *
     * @param string $name
     * @param QueryBuilder $qb
     *
     * @return QueryBuilder
     */
    private function buildByNameLike($name, QueryBuilder $qb = null){
        if(null === $qb) {
            $qb = $this->createQueryBuilder(self::QUERY_ALIAS);
        }

        return $qb
            ->andWhere(sprintf("%s.name LIKE :name", self::QUERY_ALIAS))
            ->setParameter('name', sprintf("%\%s%", $name))
            ;
    }
}