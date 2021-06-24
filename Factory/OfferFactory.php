<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Factory;

use LSB\OfferBundle\Entity\OfferInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class OfferFactory
 * @package LSB\OfferBundle\Factory
 */
class OfferFactory extends BaseFactory implements OfferFactoryInterface
{

    /**
     * @return OfferInterface
     */
    public function createNew(): OfferInterface
    {
        return parent::createNew();
    }

}
