<?php

namespace Flucava\CqrsCoreBundle\DependencyInjection\Compiler;

use Flucava\CqrsCore\Command\CommandBus;

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
}
