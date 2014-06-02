<?php
/**
 * Created by PhpStorm.
 * User: ronan
 * Date: 02/06/2014
 * Time: 23:54
 */

namespace OpenWines\WebAppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\QueryBuilder;

abstract class BaseRepository extends EntityRepository
{
    /**
     * used in DQL expressions
     */
    const QUERY_ALIAS = '';


    /** ************* */
    /** F I N D E R S */


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
            ->execute()
        ;
    }

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
            ->execute()
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


    /** *************** */
    /** B U I L D E R S */


    /**
     * buildOrderByName
     *
     * @param QueryBuilder $qb
     * @param string $direction
     *
     * @return QueryBuilder
     */
    protected function buildOrderByName(QueryBuilder $qb = null, $direction = 'ASC')
    {
        if(null === $qb) {
            $qb = $this->createQueryBuilder(static::QUERY_ALIAS);
        }

        return $qb
            ->orderBy(sprintf("%s.name", static::QUERY_ALIAS), $direction)
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
    protected function buildByNameLike($name, QueryBuilder $qb = null){
        if(null === $qb) {
            $qb = $this->createQueryBuilder(static::QUERY_ALIAS);
        }

        return $qb
            ->andWhere(sprintf("%s.name LIKE :name", static::QUERY_ALIAS))
            ->setParameter('name', sprintf("%\%s%", $name))
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
            $qb = $this->createQueryBuilder(static::QUERY_ALIAS);
        }

        return $qb
            ->orderBy(sprintf("%s.createdAt", static::QUERY_ALIAS), $direction)
        ;
    }


} 