<?php

namespace Nasyrov\Laravel\LocalServer;

use Composer\Command\BaseCommand;
use InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends BaseCommand
{
    protected $subcommands = [
        'artisan' => Subcommands\ArtisanSubcommand::class,
        'build'   => Subcommands\BuildSubcommand::class,
        'destroy' => Subcommands\DestroySubcommand::class,
        'logs'    => Subcommands\LogsSubcommand::class,
        'start'   => Subcommands\StartSubcommand::class,
        'status'  => Subcommands\StatusSubcommand::class,
        'stop'    => Subcommands\StopSubcommand::class,
    ];

    protected function configure(): void
    {
        $this
            ->setName('local-server')
            ->setDescription('Laravel local server')
            ->setDefinition([
                new InputArgument('subcommand', InputArgument::REQUIRED, implode(', ', array_keys($this->subcommands))),
                new InputArgument('options', InputArgument::IS_ARRAY),
            ])
            ->setAliases(['local-server'])
            ->setHelp(
                <<<EOT
Run the local server.

Start the local server:
    start
Stop the local server:
    stop
Destroy the local server:
    destroy
View the status of the local server:
    status
View the logs
    logs <service>                <service> can be php, nginx, mysql, redis
Run artisan command:
    artisan -- <command>          eg: artisan -- migrate
EOT
            );
    }

    public function isProxyCommand(): bool
    {
        return true;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $subcommand = $input->getArgument('subcommand');

        if (!isset($this->subcommands[$subcommand])) {
            throw new InvalidArgumentException(\Safe\sprintf('Invalid subcommand given: %s', $subcommand));
        }

        $subcommandClass    = $this->subcommands[$subcommand];
        $subcommandInstance = new $subcommandClass($this->getApplication());

        $exitCode = $subcommandInstance($input, $output);

        return $exitCode;
    }
}
