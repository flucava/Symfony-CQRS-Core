<?php

namespace Flucava\CqrsCoreBundle\DependencyInjection\Compiler;

use Flucava\CqrsCore\Attribute\CommandHandler;
use Flucava\CqrsCore\Command\CommandBus;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Philipp Marien
 */
readonly class CommandHandlerBusPass extends AbstractHandlerBusPass
{
    public const SERVICE_TAG = 'flucava.cqrs_core.command_handler';

    public function __construct()
    {
        parent::__construct(self::SERVICE_TAG, CommandBus::class);
    }

    public function process(ContainerBuilder $container): void
    {
        $container->registerAttributeForAutoconfiguration(
            CommandHandler::class,
            static function (ChildDefinition $definition): void {
                $definition->addTag(self::SERVICE_TAG);
            }
        );

        parent::process($container);
    }
}
