<?php

namespace Flucava\CqrsCoreBundle\DependencyInjection\Compiler;

use Flucava\CqrsCore\Query\QueryBus;

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
}
