<?php

namespace Nasyrov\Laravel\LocalServer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface, Capable
{
    public function activate(Composer $composer, IOInterface $io)
    {
        //
    }

    public function getCapabilities()
    {
        return [
            //
        ];
    }
}
