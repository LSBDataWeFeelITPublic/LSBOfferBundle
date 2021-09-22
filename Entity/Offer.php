<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use LSB\ContractorBundle\Entity\Address;
use LSB\ContractorBundle\Entity\ContractorInterface;
use LSB\LocaleBundle\Entity\CurrencyInterface;
use LSB\UserBundle\Entity\UserInterface;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\UuidTrait;

/**
 * Class Offer
 * @package LSB\OfferBundle\Entity
 *
 * @MappedSuperclass
 */
class Offer implements OfferInterface
{
    use UuidTrait;
    use CreatedUpdatedTrait;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected string $name;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected ?string $number;

    /**
     * @var ContractorInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\ContractorInterface")
     * @ORM\JoinColumn(name="contractor_id", referencedColumnName="id", nullable=true)
     */
    protected ?ContractorInterface $contractor;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected ?string $contractorName;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected ?string $contractorTaxNumber;

    /**
     * @ORM\Embedded(class="LSB\ContractorBundle\Entity\Address", columnPrefix="contractor_")
     */
    protected ?Address $contractorAddress;

    /**
     * @ORM\ManyToOne(targetEntity="LSB\LocaleBundle\Entity\CurrencyInterface")
     * @ORM\JoinColumn(name="currency_id", referencedColumnName="id", nullable=true)
     */
    protected ?CurrencyInterface $currency;

    /**
     * @var UserInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\UserBundle\Entity\UserInterface")
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=true)
     */
    protected ?UserInterface $creator;

    /**
     * @var Collection|VariantInterface[]
     * @ORM\OneToMany(targetEntity="LSB\OfferBundle\Entity\VariantInterface", mappedBy="offer")
     */
    protected Collection $variants;


    /**
     * Offer constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->generateUuid();

        $this->variants = new ArrayCollection();
    }

    public function __clone()
    {
        if ($this->getId()) {
            $this->id = null;
        }

        $this->generateUuid($force = true);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Offer
     */
    public function setName(string $name): Offer
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string|null $number
     * @return Offer
     */
    public function setNumber(?string $number): Offer
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return ContractorInterface|null
     */
    public function getContractor(): ?ContractorInterface
    {
        return $this->contractor;
    }


    /**
     * @param ContractorInterface|null $contractor
     * @param bool $overrideData
     * @return $this
     */
    public function setContractor(?ContractorInterface $contractor, bool $overrideData = false): Offer
    {
        $this->contractor = $contractor;

        if ($overrideData) {
            $this->contractorName = $contractor->getName();
            $this->contractorTaxNumber = $contractor->getTaxNumber();
            $this->contractorAddress = $contractor->getAddress();
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContractorName(): ?string
    {
        return $this->contractorName;
    }

    /**
     * @param string|null $contractorName
     * @return Offer
     */
    public function setContractorName(?string $contractorName): Offer
    {
        $this->contractorName = $contractorName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContractorTaxNumber(): ?string
    {
        return $this->contractorTaxNumber;
    }

    /**
     * @param string|null $contractorTaxNumber
     * @return Offer
     */
    public function setContractorTaxNumber(?string $contractorTaxNumber): Offer
    {
        $this->contractorTaxNumber = $contractorTaxNumber;
        return $this;
    }

    /**
     * @return Address|null
     */
    public function getContractorAddress(): ?Address
    {
        return $this->contractorAddress;
    }

    /**
     * @param Address|null $contractorAddress
     * @return Offer
     */
    public function setContractorAddress(?Address $contractorAddress): Offer
    {
        $this->contractorAddress = $contractorAddress;
        return $this;
    }

    /**
     * @return UserInterface|null
     */
    public function getCreator(): ?UserInterface
    {
        return $this->creator;
    }

    /**
     * @param UserInterface|null $creator
     * @return Offer
     */
    public function setCreator(?UserInterface $creator): Offer
    {
        $this->creator = $creator;
        return $this;
    }

    /**
     * @return Collection|VariantInterface[]
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * @param Collection|VariantInterface[] $variants
     * @return Offer
     */
    public function setVariants($variants)
    {
        $this->variants = $variants;
        return $this;
    }

    /**
     * @return CurrencyInterface|null
     */
    public function getCurrency(): ?CurrencyInterface
    {
        return $this->currency;
    }

    /**
     * @param CurrencyInterface|null $currency
     * @return Offer
     */
    public function setCurrency(?CurrencyInterface $currency): Offer
    {
        $this->currency = $currency;
        return $this;
    }


}
