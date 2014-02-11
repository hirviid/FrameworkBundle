<?php
/**
 * User: david@truecolor.be
 * Date: 11/02/14
 * Time: 08:34
 */

namespace Hirviid\Bundle\FrameworkBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * HirviidFrameworkExtension.
 *
 * @author David Van Gompel <david@truecolor.be>
 */
class HirviidFrameworkExtension extends Extension
{
    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}