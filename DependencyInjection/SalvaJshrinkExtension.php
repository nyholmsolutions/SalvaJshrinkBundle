<?php

namespace Salva\JshrinkBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

class SalvaJshrinkExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);
        
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('service.xml');
        
        $container
            ->getDefinition('salva_assetic_filter.jshrink')
            ->replaceArgument(0, $config);

        $container
            ->getDefinition('salva_twig_extension.jshrink')
            ->replaceArgument(0, $config);
    }

    public function getAlias()
    {
        return 'salva_jshrink';
    }
}