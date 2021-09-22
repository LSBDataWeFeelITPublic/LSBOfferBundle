<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Entity;

use LSB\ProductBundle\Entity\ProductInterface;
use Money\Money;

interface LineInterface
{
    public function getVariant(): VariantInterface;

    public function setVariant(VariantInterface $variant): self;

    public function getProduct(): ?ProductInterface;

    public function setProduct(?ProductInterface $product): self;

    public function getName(): string;

    public function setName(string $name): self;

    public function getPrice(bool $useObject): Money|int|null;

    public function setPrice(Money|int|null $price): self;

    public function getDiscount(bool $useObject): Money|int|null;

    public function setDiscount(Money|int|null $discount): self;

    public function getVat(bool $useObject): Money|int|null;

    public function setVat(Money|int|null $vat): self;

    public function getUnit(): ?string;

    public function setUnit(?string $unit): self;

    public function getQuantity(bool $useObject): Money|int|null;

    public function setQuantity(Money|int|null $quantity): self;
}
