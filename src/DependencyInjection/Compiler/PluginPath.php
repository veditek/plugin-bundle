<?php

namespace Vchain\PluginBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Vchain\PluginBundle\Interfaces\PluginInterface;
use Vchain\PluginBundle\Service\Plugin;

class PluginPath implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(Plugin::class)) {
            return;
        }

        $controller = $container->findDefinition(Plugin::class);
        foreach (array_keys($container->findTaggedServiceIds(PluginInterface::TAG)) as $serviceId) {
            $controller->addMethodCall('addPluginService', [new Reference($serviceId)]);
        }
    }

}