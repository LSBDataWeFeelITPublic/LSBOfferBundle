<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Entity;

use LSB\ProductBundle\Entity\ProductInterface;

interface LineInterface
{
    public function getVariant(): VariantInterface;

    public function setVariant(VariantInterface $variant): self;

    public function getProduct(): ?ProductInterface;

    public function setProduct(?ProductInterface $product): self;

    public function getName(): string;

    public function setName(string $name): self;

    public function getPrice(): ?float;

    public function setPrice(?float $price): self;

    public function getDiscount(): ?float;

    public function setDiscount(?float $discount): self;

    public function getVat(): ?float;

    public function setVat(?float $vat): self;

    public function getUnit(): ?string;

    public function setUnit(?string $unit): self;

    public function getQuantity(): ?int;

    public function setQuantity(?int $quantity): self;
}
