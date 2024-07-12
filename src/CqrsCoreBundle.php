<?php

namespace Flucava\CqrsCoreBundle;

use Flucava\CqrsCoreBundle\DependencyInjection\Compiler\CommandHandlerBusPass;
use Flucava\CqrsCoreBundle\DependencyInjection\Compiler\QueryHandlerBusPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Philipp Marien
 */
class CqrsCoreBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new CommandHandlerBusPass());

        $container->addCompilerPass(new QueryHandlerBusPass());
    }
}
