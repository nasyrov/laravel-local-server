<?php

namespace Nasyrov\Laravel\LocalServer\Subcommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class StartSubcommand extends Subcommand
{
    const COMMAND = 'docker-compose up -d';

    public function __invoke(InputInterface $input, OutputInterface $output): int
    {
        $this->ensureNetworkPresence($output);

        $isStartupFailed = $this->runProcess(static::COMMAND);

        if ($isStartupFailed) {
            $output->writeln('<error>Sorry, the local server is failed to start.</>');

            return $isStartupFailed;
        }

        $siteUrl = sprintf('http://%s.localtest.me/', $this->getProjectName());

        $output->writeln('');
        $output->writeln('<info>Your local server is ready!</>');
        $output->writeln(sprintf('<info>To access your site visit:</> <comment>%s</>', $siteUrl));

        return $isStartupFailed;
    }

    protected function ensureNetworkPresence(OutputInterface $output): void
    {
        $requiredNetwork = 'laravel';

        $process = new Process(
            'docker network list --format="{{.Name}}"',
            static::CWD,
            $this->getEnvironmentVariables()
        );

        $process->run();

        if (strpos($process->getOutput(), $requiredNetwork) !== false) {
            return;
        }

        $isFailed = $this->runProcess(sprintf('docker network create %s', $requiredNetwork));

        if ($isFailed) {
            $output->writeln('<error>Sorry, the local server is failed to setup the required network.</>');
        }
    }
}
