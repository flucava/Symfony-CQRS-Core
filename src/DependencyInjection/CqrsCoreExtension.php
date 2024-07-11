<?php

namespace Flucava\CqrsCoreBundle\DependencyInjection;

use Flucava\Core\Command\CommandBus;
use Flucava\Core\Query\QueryBus;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

/**
 * @author Philipp Marien
 */
class CqrsCoreExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $container->autowire(CommandBus::class)->setPublic(false);

        $container->autowire(QueryBus::class)->setPublic(false);
    }
}
