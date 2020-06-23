<?php

namespace Nasyrov\Laravel\LocalServer\Subcommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

class EjectSubcommand extends Subcommand
{
    public function __invoke(InputInterface $input, OutputInterface $output): int
    {
        $filesystem = new Filesystem;

        try {
            $output->writeln('<info>Ejecting...</>');

            $filesystem->mirror(__DIR__.'/../../docker', getcwd().'/docker');

            $output->writeln('<info>Your local server configuration is ejected successfully!</>');

            return 0;
        } catch (IOExceptionInterface $exception) {
            $output->writeln('<error>Sorry, something went wrong there.</>');

            return 1;
        }
    }
}
