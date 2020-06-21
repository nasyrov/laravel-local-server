<?php

namespace Nasyrov\Laravel\LocalServer\Subcommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ArtisanSubcommand extends Subcommand
{
    const COMMAND = 'docker-compose exec -T -u nobody backend php artisan %s';

    public function __invoke(InputInterface $input, OutputInterface $output): int
    {
        $options = $input->getArgument('options');
        $options = implode(' ', $options);

        return $this->runProcess(sprintf(static::COMMAND, $options));
    }
}
