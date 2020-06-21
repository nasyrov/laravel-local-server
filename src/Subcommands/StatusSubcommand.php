<?php

namespace Nasyrov\Laravel\LocalServer\Subcommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StatusSubcommand extends Subcommand
{
    const COMMAND = 'docker-compose ps';

    public function __invoke(InputInterface $input, OutputInterface $output): int
    {
        return $this->runProcess(static::COMMAND);
    }
}
