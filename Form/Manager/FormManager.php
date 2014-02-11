<?php
/**
 * User: david@truecolor.be
 * Date: 11/02/14
 * Time: 08:25
 */

namespace Hirviid\Bundle\FrameworkBundle\Form\Manager;


use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * FormManager is a simple implementation of FormManagerInterface.
 *
 * It provides methods to common features needed in a FormManager.
 *
 * @author David Van Gompel <david@truecolor.be>
 */
class FormManager implements FormManagerInterface
{
    private $em;
    private $eventDispatcher;

    /**
     * {@inheritDoc}
     */
    public function __construct(EntityManager $entityManager, EventDispatcherInterface $eventDispatcher)
    {
        $this->em = $entityManager;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * {@inheritDoc}
     */
    public function flush($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function remove($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }
}