<?php

namespace Vchain\PluginBundle\Service;

use Vchain\PluginBundle\Interfaces\PluginInterface;
use Vchain\PluginBundle\Interfaces\PluginItemInterface;

class Plugin
{
    private $pluginServices = [];

    public function addPluginService(PluginInterface $pluginService)
    {
        $this->pluginServices[$pluginService->getType()][$pluginService->getSubtype()] = $pluginService;
    }

    public function getTypes(): array
    {
        $result = [];
        foreach ($this->pluginServices as $typeName => $type) {
            foreach ($type as $subtypeName => $subtype) {
                $result[$typeName][] = $subtypeName;
            }
        }
        return $result;
    }

    public function create(string $type, string $subtype): ?PluginItemInterface
    {
        if (!isset($this->pluginServices[$type][$subtype])) return null;
        $func = $this->pluginServices[$type][$subtype] . '::' . 'create';
        return $func();
    }
}