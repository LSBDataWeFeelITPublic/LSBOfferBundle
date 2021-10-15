<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Service;

use LSB\OfferBundle\Entity\Offer;
use LSB\OfferBundle\Interfaces\ConverterModuleInterface;
use LSB\OfferBundle\Model\ConvertOptions;
use LSB\UtilityBundle\Module\ModuleInterface;

/**
 * Class OfferConverter
 * @package LSB\OfferBundle\Service
 */
class OfferConverter
{

    public function __construct(
        protected OfferConverterInventory $converterInventory
    ) {

    }

    public function getConverter(string $moduleName, string $name = ModuleInterface::ADDITIONAL_NAME_DEFAULT): ConverterModuleInterface|ModuleInterface
    {
        return $this->converterInventory->getModuleByName($moduleName, $name, false);
    }

    public function convert(Offer $offer, ConvertOptions $options, string $moduleName, ?string $name): object
    {
        return $this->getConverter($moduleName, $name)->convert($offer, $options);
    }

}
