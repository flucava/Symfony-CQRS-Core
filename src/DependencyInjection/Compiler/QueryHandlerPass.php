<?php

namespace Flucava\CqrsCoreBundle\DependencyInjection\Compiler;

use Flucava\CqrsCore\Query\QueryBus;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Compiler\ServiceLocatorTagPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Philipp Marien
 */
class QueryHandlerPass implements CompilerPassInterface
{
    public const SERVICE_TAG = 'flucava.cqrs_core.query_handler';

    public function process(ContainerBuilder $container): void
    {
        $container->findDefinition(QueryBus::class)->addArgument(
            ServiceLocatorTagPass::register(
                $container,
                $container->findTaggedServiceIds(self::SERVICE_TAG)
            )
        );
    }
}
