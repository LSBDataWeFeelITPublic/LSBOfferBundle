<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Entity;

interface VariantInterface
{
    public function getOffer(): OfferInterface;

    public function setOffer(OfferInterface $offer): self;

    public function getName(): string;

    public function setName(string $name): self;

    public function getLines();

    public function setLines($lines);
}
