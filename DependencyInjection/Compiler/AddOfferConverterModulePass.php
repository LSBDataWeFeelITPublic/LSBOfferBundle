<?php
declare(strict_types=1);

namespace LSB\OfferBundle\DependencyInjection\Compiler;

use LSB\OfferBundle\Interfaces\ConverterModuleInterface;
use LSB\OfferBundle\Service\OfferConverterInventory;
use LSB\UtilityBundle\ModuleInventory\BaseModuleInventory;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class AddOfferConverterModulePass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(OfferConverterInventory::class)) {
            return;
        }

        $def = $container->findDefinition(OfferConverterInventory::class);

        foreach ($container->findTaggedServiceIds(ConverterModuleInterface::MODULE_TAG_NAME) as $id => $attrs) {
            $def->addMethodCall(BaseModuleInventory::ADD_MODULE_METHOD, [new Reference($id), $attrs]);
        }
    }
}
