<?php

namespace Vchain\PluginBundle\Interfaces;

interface PluginInterface
{
    public const TAG = 'plugin.service';

    public static function getType(): string;
    public static function getName(): string;
}