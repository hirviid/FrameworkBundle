<?php
/**
 * User: david@truecolor.be
 * Date: 11/02/14
 * Time: 08:21
 */

namespace Hirviid\Bundle\FrameworkBundle\Form\Manager;

use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * FormManagerInterface
 *
 * @author David Van Gompel <david@truecolor.be>
 */
interface FormManagerInterface
{
    /**
     * @param EntityManager $entityManager
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EntityManager $entityManager, EventDispatcherInterface $eventDispatcher);

    /**
     * Flush entity.
     *
     * @param object $entity
     *
     * @return mixed
     */
    public function flush($entity);

    /**
     * Remove entity
     *
     * @param object $entity
     *
     * @return mixed
     */
    public function remove($entity);
}