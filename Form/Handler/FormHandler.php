<?php
/**
 * User: david@truecolor.be
 * Date: 11/02/14
 * Time: 08:13
 */

namespace Hirviid\Bundle\FrameworkBundle\Form\Handler;

use Hirviid\Bundle\FrameworkBundle\Form\Manager\FormManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * FormHandler is a simple implementation of FormHandlerInterface.
 *
 * It provides methods to common features needed in a FormHandler.
 *
 * @author David Van Gompel <david@truecolor.be>
 */
class FormHandler implements FormHandlerInterface
{
    /**
     * @var FormManagerInterface
     */
    protected $manager;

    /**
     * @param FormManagerInterface $manager
     */
    public function __construct(FormManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritDoc}
     */
    public function handle(FormInterface $form, Request $request)
    {
        if (!$request->isMethod('POST')) {
            return false;
        }

        $form->handleRequest($request);

        if (!$form->isValid()) {
            return false;
        }

        $data = $form->getData();

        return $this->doHandle($form, $request, $data);
    }

    /**
     * Finish form handling.
     *
     * @param FormInterface $form
     * @param Request $request
     * @param object $data
     *
     * @return bool
     */
    protected function doHandle(FormInterface $form, Request $request, $data)
    {
        $this->manager->flush($data);

        return true;
    }
}