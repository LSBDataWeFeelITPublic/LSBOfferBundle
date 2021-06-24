<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Entity;

use LSB\ContractorBundle\Entity\Address;
use LSB\ContractorBundle\Entity\ContractorInterface;
use LSB\UserBundle\Entity\UserInterface;

// TODO rozszerzać interfejsy UUID, created itd?
interface OfferInterface
{
    public function getName(): string;

    public function setName(string $name): self;

    public function getNumber(): ?string;

    public function setNumber(?string $number): self;

    public function getContractor(): ?ContractorInterface;

    public function setContractor(?ContractorInterface $contractor, bool $overrideData = false): self;

    public function getContractorName(): ?string;

    public function setContractorName(?string $contractorName): self;

    public function getContractorTaxNumber(): ?string;

    public function setContractorTaxNumber(?string $contractorTaxNumber): self;

    public function getContractorAddress(): ?Address;

    public function setContractorAddress(?Address $contractorAddress): self;

    public function getCreator(): ?UserInterface;

    public function setCreator(?UserInterface $creator): self;

    public function getVariants();

    public function setVariants($variants);

}
