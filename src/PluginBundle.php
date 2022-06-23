<?php

namespace Vchain\PluginBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Vchain\PluginBundle\DependencyInjection\Compiler\PluginPath;
use Vchain\PluginBundle\Interfaces\PluginInterface;

class PluginBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new PluginPath());
        $container->registerForAutoconfiguration(PluginInterface::class)->addTag(PluginInterface::TAG);
    }

}