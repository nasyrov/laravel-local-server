<?php

namespace Nasyrov\Laravel\LocalServer;

use Composer\Plugin\Capability\CommandProvider as ComposerCommandProvider;

class CommandProvider implements ComposerCommandProvider
{
    public function getCommands(): array
    {
        return [
            //
        ];
    }
}
