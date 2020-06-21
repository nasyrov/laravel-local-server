<?php

namespace Nasyrov\Laravel\LocalServer\Subcommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildSubcommand extends Subcommand
{
    const COMMAND = 'docker-compose build';

    public function __invoke(InputInterface $input, OutputInterface $output): int
    {
        return $this->runProcess(static::COMMAND);
    }
}
