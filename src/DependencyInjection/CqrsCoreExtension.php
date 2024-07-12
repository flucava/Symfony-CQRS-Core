<?php

namespace Flucava\CqrsCoreBundle\DependencyInjection;

use Flucava\CqrsCore\Attribute\CommandHandler;
use Flucava\CqrsCore\Attribute\QueryHandler;
use Flucava\CqrsCore\Command\CommandBus;
use Flucava\CqrsCore\Query\QueryBus;
use Flucava\CqrsCoreBundle\DependencyInjection\Compiler\CommandHandlerBusPass;
use Flucava\CqrsCoreBundle\DependencyInjection\Compiler\QueryHandlerBusPass;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

/**
 * @author Philipp Marien
 */
class CqrsCoreExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $container->registerAttributeForAutoconfiguration(
            CommandHandler::class,
            static function (ChildDefinition $definition): void {
                $definition->addTag(CommandHandlerBusPass::SERVICE_TAG);
            }
        );

        $container->autowire(CommandBus::class)->setPublic(false);

        $container->registerAttributeForAutoconfiguration(
            QueryHandler::class,
            static function (ChildDefinition $definition): void {
                $definition->addTag(QueryHandlerBusPass::SERVICE_TAG);
            }
        );

        $container->autowire(QueryBus::class)->setPublic(false);
    }
}
