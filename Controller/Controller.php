<?php
/**
 * User: david@truecolor.be
 * Date: 11/02/14
 * Time: 07:23
 */

namespace Hirviid\Bundle\FrameworkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Controller is a simple implementation of a Controller.
 *
 * It provides methods to common features needed in controllers.
 *
 * @author David Van Gompel <david@truecolor.be>
 */
class Controller extends SymfonyController
{
    /**
     * Throw an accessDeniedException if the current user does not have role $role.
     *
     * @param string $role
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    protected function requiresRole($role)
    {
        $securityContext = $this->get('security.context');

        if (null === $this->getUser() || false === $securityContext->isGranted($role)) {
            throw new AccessDeniedException();
        }
    }

    /**
     * Throw an accessDeniedException if the current user isn't the same as the user provided.
     * Inverse of denySameUser().
     *
     * @param object $user
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    protected function enforceSameUser($user)
    {
        if ($user !== $this->getUser()) {
            throw new AccessDeniedException();
        }
    }

    /**
     * Throw an accessDeniedException if the current user is the same as the user provided.
     * Inverse of enforceSameUser().
     *
     * @param $user
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    protected function denySameUser($user)
    {
        if ($user === $this->getUser()) {
            throw new AccessDeniedException();
        }
    }

    /**
     * Gets a service parameter by id.
     *
     * @param string $id The service parameter id
     *
     * @return mixed The service parameter
     */
    protected function getContainerParameter($id)
    {
        return $this->get('service_container')->getParameter($id);
    }
}