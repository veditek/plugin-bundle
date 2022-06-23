<?php

namespace Vchain\PluginBundle\Interfaces;

interface PluginItemInterface
{
    public function getType(): ?string;
    public function getSubtype(): ?string;
}