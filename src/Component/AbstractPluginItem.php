<?php

namespace Vchain\PluginBundle\Component;

use Vchain\PluginBundle\Interfaces\PluginItemInterface;

abstract class AbstractPluginItem implements PluginItemInterface
{
    private $type;
    private $subtype;

    public function setType(string $type, string $subtype): void
    {
        $this->type = $type;
        $this->subtype = $subtype;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getSubtype(): ?string
    {
        return $this->subtype;
    }
}