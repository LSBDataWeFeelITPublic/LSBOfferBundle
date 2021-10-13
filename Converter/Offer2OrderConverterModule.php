<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Converter;


use LSB\OfferBundle\Interfaces\ConverterModuleInterface;
use LSB\OrderBundle\Entity\OrderInterface;

class Offer2OrderConverterModule implements ConverterModuleInterface
{

    const MODULE = 'offer2order';
    const NAME = self::MODULE;

    public function getName(): string
    {
        return static::NAME;
    }

    public function getAdditionalName(): string
    {
        return static::ADDITIONAL_NAME_DEFAULT;
    }


    public function convert(object $obj): ?OrderInterface
    {
        // TODO: Implement convert() method.
    }


}
