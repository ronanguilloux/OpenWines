<?php
/**
 * Created by PhpStorm.
 * User: ronan
 * Date: 02/06/2014
 * Time: 23:52
 */
namespace OpenWines\WebAppBundle\Repository;

use Doctrine\ORM\NoResultException;
use Doctrine\ORM\QueryBuilder;

class AppellationRepository extends BaseRepository
{

    /**
     * used in DQL expressions
     */
    const QUERY_ALIAS = 'r';

    /** ************* */
    /** F I N D E R S */
    public function findByVignobleOrderByName($vignobleId)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                '
            SELECT a, r FROM OpenWinesWebAppBundle:Appellation a
            INNER JOIN a.vignoble r
            WHERE r.id = :id'
            )->setParameter('id', (int) $vignobleId);
        try {
            return $query->getSingleResult();
        } catch (NoResultException $e) {
            return;
        }
    }

    /** *************** */
    /** B U I L D E R S */

    /**
     * buildByVignoble
     *
     * @throws \InvalidArgumentException
     *
     * @param int          $vignobleId
     * @param QueryBuilder $qb
     *
     * @return QueryBuilder
     */
    protected function buildByVignoble($vignobleId, QueryBuilder $qb = null)
    {
        if ((int) $vignobleId < 0) {
            throw new \InvalidArgumentException("vignobleId cannot be < 0.");
        }

        if (null === $qb) {
            $qb = $this->createQueryBuilder(static::QUERY_ALIAS);
        }

        return $qb
             ->andWhere($qb->expr()->in('vignoble.id', $vignobleId))
        ;
    }
}
