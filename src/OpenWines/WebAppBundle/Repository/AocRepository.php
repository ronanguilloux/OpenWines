<?php
/**
 * Created by PhpStorm.
 * User: ronan
 * Date: 02/06/2014
 * Time: 23:52
 */

namespace OpenWines\WebAppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\QueryBuilder;

class AocRepository extends BaseRepository
{

    /**
     * used in DQL expressions
     */
    const QUERY_ALIAS = 'r';


    /** ************* */
    /** F I N D E R S */


    public function findByRegionOrderByName($regionId)
    {
        $query = $this->getEntityManager()
            ->createQuery('
            SELECT a, r FROM OpenWinesWebAppBundle:AOC a
            INNER JOIN a.region r
            WHERE r.id = :id'
            )->setParameter('id', (int)$regionId);
        try {
            return $query->getSingleResult();
        } catch (NoResultException $e) {
            return null;
        }
    }

    /** *************** */
    /** B U I L D E R S */


    /**
     * buildByRegion
     *
     * @throws \InvalidArgumentException
     *
     * @param int $regionId
     * @param QueryBuilder $qb
     *
     * @return QueryBuilder
     */
    protected function buildByRegion($regionId, QueryBuilder $qb = null)
    {
        if((int)$regionId < 0) {
            throw new \InvalidArgumentException("regionId cannot be < 0.");
        }

        if(null === $qb) {
            $qb = $this->createQueryBuilder(static::QUERY_ALIAS);
        }

        return $qb
             ->andWhere($qb->expr()->in('region.id',$regionId))
        ;
    }
} 