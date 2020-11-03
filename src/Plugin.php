<?php

namespace Nasyrov\Laravel\LocalServer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\Capability\CommandProvider as ComposerCommandProvider;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface, Capable
{
    public function activate(Composer $composer, IOInterface $io): void
    {
        //
    }

    public function deactivate(Composer $composer, IOInterface $io): void
    {
        //
    }

    public function uninstall(Composer $composer, IOInterface $io): void
    {
        //
    }

    public function getCapabilities(): array
    {
        return [
            ComposerCommandProvider::class => CommandProvider::class,
        ];
    }
}
