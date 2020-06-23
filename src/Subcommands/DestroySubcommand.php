<?php

namespace Nasyrov\Laravel\LocalServer\Subcommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DestroySubcommand extends Subcommand
{
    const COMMAND = 'docker-compose down -v';

    public function __invoke(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Destroying...</>');

        return $this->runProcess(static::COMMAND);
    }
}
