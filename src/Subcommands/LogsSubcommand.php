<?php

namespace Nasyrov\Laravel\LocalServer\Subcommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LogsSubcommand extends Subcommand
{
    const COMMAND = 'docker-compose logs --tail=100 -f %s';

    public function __invoke(InputInterface $input, OutputInterface $output): int
    {
        $service = $input->getArgument('options')[0];

        return $this->runProcess(sprintf(static::COMMAND, $service));
    }
}
