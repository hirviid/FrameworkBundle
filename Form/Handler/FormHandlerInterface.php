<?php
/**
 * User: david@truecolor.be
 * Date: 11/02/14
 * Time: 08:12
 */

namespace Hirviid\Bundle\FrameworkBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * FormHandlerInterface
 *
 * @author David Van Gompel <david@truecolor.be>
 */
interface FormHandlerInterface
{
    /**
     * Handle a $form with $request
     *
     * @param FormInterface $form
     * @param Request $request
     *
     * @return boolean
     */
    public function handle(FormInterface $form, Request $request);
}