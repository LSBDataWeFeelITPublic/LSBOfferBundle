<?php

namespace LSB\OfferBundle;

use LSB\OfferBundle\DependencyInjection\Compiler\AddManagerResourcePass;
use LSB\OfferBundle\DependencyInjection\Compiler\AddOfferConverterModulePass;
use LSB\OfferBundle\DependencyInjection\Compiler\AddResolveEntitiesPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class LSBOfferBundle
 * @package LSB\OfferBundle
 */
class LSBOfferBundle extends Bundle
{

    /**
     * @param ContainerBuilder $builder
     */
    public function build(ContainerBuilder $builder)
    {
        parent::build($builder);

        $builder
            ->addCompilerPass(new AddManagerResourcePass())
            ->addCompilerPass(new AddResolveEntitiesPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 1)
            ->addCompilerPass(new AddOfferConverterModulePass());
    }


}
