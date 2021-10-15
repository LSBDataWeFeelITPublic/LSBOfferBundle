<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Converter;

use LSB\OfferBundle\Entity\OfferInterface;
use LSB\OfferBundle\Interfaces\ConverterModuleInterface;
use LSB\OfferBundle\Model\ConvertOptions;
use LSB\OrderBundle\Entity\OrderInterface;
use LSB\OrderBundle\Manager\OrderManagerInterface;

class Offer2OrderConverterModule implements ConverterModuleInterface
{
    const MODULE = 'offer2order';
    const NAME = self::MODULE;


    public function __construct(protected OrderManagerInterface $orderManager)
    {
    }

    public function getName(): string
    {
        return static::NAME;
    }

    public function getAdditionalName(): string
    {
        return static::ADDITIONAL_NAME_DEFAULT;
    }


    public function convert(object $obj, ConvertOptions $options): OrderInterface
    {
        if ($obj instanceof OfferInterface) {
            // TODO use OrderManager
            $order = null;

            return $order;
        } else {
            throw new \InvalidArgumentException("Object does not implement OfferInterface");
        }
    }


}
