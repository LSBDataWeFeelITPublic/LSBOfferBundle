<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Factory;

use LSB\OfferBundle\Entity\VariantInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class VariantFactory
 * @package LSB\OfferBundle\Factory
 */
class VariantFactory extends BaseFactory implements VariantFactoryInterface
{

    /**
     * @return VariantInterface
     */
    public function createNew(): VariantInterface
    {
        return parent::createNew();
    }

}
