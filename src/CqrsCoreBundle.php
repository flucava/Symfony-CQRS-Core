<?php

namespace Flucava\CqrsCoreBundle;

use Flucava\Core\Attribute\CommandHandler;
use Flucava\Core\Attribute\QueryHandler;
use Flucava\CqrsCoreBundle\DependencyInjection\Compiler\CommandHandlerPass;
use Flucava\CqrsCoreBundle\DependencyInjection\Compiler\QueryHandlerPass;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Philipp Marien
 */
class CqrsCoreBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->registerAttributeForAutoconfiguration(
            CommandHandler::class,
            static function (ChildDefinition $definition): void {
                $definition->addTag(CommandHandlerPass::SERVICE_TAG);
            }
        );

        $container->registerAttributeForAutoconfiguration(
            QueryHandler::class,
            static function (ChildDefinition $definition): void {
                $definition->addTag(QueryHandlerPass::SERVICE_TAG);
            }
        );

        $container->addCompilerPass(new CommandHandlerPass());

        $container->addCompilerPass(new QueryHandlerPass());
    }
}
