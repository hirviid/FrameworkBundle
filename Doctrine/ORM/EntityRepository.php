<?php
/**
 * User: david@truecolor.be
 * Date: 11/02/14
 * Time: 07:51
 */

namespace Hirviid\Bundle\FrameworkBundle\Doctrine\ORM;

use Doctrine\ORM\EntityRepository as DoctrineORMEntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * EntityRepository is a simple implementation of an EntityRepository.
 *
 * It provides methods to common features needed in entity repositories.
 *
 * @author David Van Gompel <david@truecolor.be>
 */
class EntityRepository extends DoctrineORMEntityRepository
{
    /**
     * Returns a new entity instance
     *
     * @return object
     */
    public function createNew()
    {
        $className = $this->getClassName();

        return new $className;
    }

    /**
     * Select all database rows which have a value from $values in its $column.
     *
     * @param string $column
     * @param array $values
     *
     * @return array
     */
    public function findIn($column, array $values)
    {
        $qb = $this->createQueryBuilder('e');

        $qb->add('where', $qb->expr()->andx(
            $qb->expr()->in('e.'.$column, $values)
        ));

        $this->doFindIn($qb);

        return $qb->getQuery()->getResult();
    }

    /**
     * Override this method to add additional conditions to findIn().
     * Usage example:
     *
     *      $qb->add('orderBy', 'e.name ASC');
     *
     * @param QueryBuilder $qb
     */
    protected function doFindIn(QueryBuilder $qb) { }

}