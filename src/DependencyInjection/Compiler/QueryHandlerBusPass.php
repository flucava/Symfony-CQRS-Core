<?php

namespace Flucava\CqrsCoreBundle\DependencyInjection\Compiler;

use Flucava\CqrsCore\Attribute\QueryHandler;
use Flucava\CqrsCore\Query\QueryBus;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Philipp Marien
 */
readonly class QueryHandlerBusPass extends AbstractHandlerBusPass
{
    public const SERVICE_TAG = 'flucava.cqrs_core.query_handler';

    public function __construct()
    {
        parent::__construct(self::SERVICE_TAG, QueryBus::class);
    }

    public function process(ContainerBuilder $container): void
    {
        $container->registerAttributeForAutoconfiguration(
            QueryHandler::class,
            static function (ChildDefinition $definition): void {
                $definition->addTag(self::SERVICE_TAG);
            }
        );

        parent::process($container);
    }
}
