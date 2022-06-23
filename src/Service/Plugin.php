<?php

namespace Vchain\PluginBundle\Service;

use Vchain\PluginBundle\Interfaces\PluginInterface;

class Plugin
{
    private $pluginServices = [];

    public function addPluginService(PluginInterface $pluginService)
    {
        $this->pluginServices[$pluginService->getType()][$pluginService->getName()] = $pluginService;
    }
}