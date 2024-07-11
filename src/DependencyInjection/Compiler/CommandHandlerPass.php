<?php

namespace Flucava\CqrsCoreBundle\DependencyInjection\Compiler;

use Flucava\CqrsCore\Command\CommandBus;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Compiler\ServiceLocatorTagPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Philipp Marien
 */
class CommandHandlerPass implements CompilerPassInterface
{
    public const SERVICE_TAG = 'flucava.cqrs_core.command_handler';

    public function process(ContainerBuilder $container): void
    {
        $container->findDefinition(CommandBus::class)->addArgument(
            ServiceLocatorTagPass::register(
                $container,
                $container->findTaggedServiceIds(self::SERVICE_TAG)
            )
        );
    }
}
