<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Interfaces;


use LSB\UtilityBundle\Module\ModuleInterface;

interface ConverterModuleInterface extends ModuleInterface
{
    const MODULE_TAG_NAME = 'offer.converter';

    public function convert(object $obj): ?object;
}
