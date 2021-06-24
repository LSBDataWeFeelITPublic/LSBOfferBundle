<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Factory;

use LSB\OfferBundle\Entity\LineInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class LineFactory
 * @package LSB\OfferBundle\Factory
 */
class LineFactory extends BaseFactory implements LineFactoryInterface
{

    /**
     * @return LineInterface
     */
    public function createNew(): LineInterface
    {
        return parent::createNew();
    }

}
