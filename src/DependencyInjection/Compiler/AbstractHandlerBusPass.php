<?php

namespace Flucava\CqrsCoreBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Compiler\ServiceLocatorTagPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Philipp Marien
 */
abstract readonly class AbstractHandlerBusPass implements CompilerPassInterface
{
    public function __construct(private string $tag, private string $busClass)
    {
    }

    public function process(ContainerBuilder $container): void
    {
        $taggedServices = $container->findTaggedServiceIds($this->tag);

        $locatedServices = [];
        foreach ($taggedServices as $id => $tags) {
            $container->findDefinition($this->busClass)
                ->addMethodCall('register', [$id]);
            $locatedServices[$id] = new Reference($id);
        }

        $container->findDefinition($this->busClass)->addArgument(
            ServiceLocatorTagPass::register($container, $locatedServices)
        );
    }
}
