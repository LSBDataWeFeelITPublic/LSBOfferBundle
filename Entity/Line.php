<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use LSB\ProductBundle\Entity\ProductInterface;
use LSB\UtilityBundle\Helper\ValueHelper;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\PositionTrait;
use LSB\UtilityBundle\Traits\UuidTrait;
use Money\Money;

/**
 * Class Line
 * @package LSB\OfferBundle\Entity
 *
 * @MappedSuperclass
 */
class Line implements LineInterface
{
    use UuidTrait;
    use CreatedUpdatedTrait;
    use PositionTrait;

    /**
     * @ORM\ManyToOne(targetEntity="LSB\OfferBundle\Entity\VariantInterface", inversedBy="lines")
     * @ORM\JoinColumn(name="variant_id", referencedColumnName="id", nullable=false)
     */
    protected VariantInterface $variant;

    /**
     * @ORM\ManyToOne(targetEntity="LSB\ProductBundle\Entity\ProductInterface")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=true)
     */
    protected ?ProductInterface $product;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected string $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected ?int $price = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected ?int $discount = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected ?int $vat = null;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected ?string $unit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected ?int $quantity = null;


    /**
     * Line constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->generateUuid();
    }

    public function __clone()
    {
        if ($this->getId()) {
            $this->id = null;
        }

        $this->generateUuid($force = true);
    }

    /**
     * @return VariantInterface
     */
    public function getVariant(): VariantInterface
    {
        return $this->variant;
    }

    /**
     * @param VariantInterface $variant
     * @return Line
     */
    public function setVariant(VariantInterface $variant): Line
    {
        $this->variant = $variant;
        return $this;
    }

    /**
     * @return ProductInterface|null
     */
    public function getProduct(): ?ProductInterface
    {
        return $this->product;
    }

    /**
     * @param ProductInterface|null $product
     * @return Line
     */
    public function setProduct(?ProductInterface $product): Line
    {
        $this->product = $product;
        return $this;
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
     * @return Line
     */
    public function setName(string $name): Line
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice(bool $useObject = false): Money|int|null
    {
        return $useObject ? ValueHelper::intToMoney($this->price, $this->getVariant()?->getOffer()?->getCurrency()?->getIsoCode()) : $this->price;
    }

    public function setPrice(Money|int|null $price): self
    {
        if ($price instanceof Money) {
            [$amount, $currency] = ValueHelper::moneyToIntCurrency($price);
            $this->price = $amount;
            return $this;
        }

        $this->price = $price;
        return $this;
    }


    public function getDiscount(bool $useObject = false): Money|int|null
    {
        return $useObject ? ValueHelper::intToMoney($this->discount, $this->getVariant()?->getOffer()?->getCurrency()?->getIsoCode()) : $this->discount;
    }

    public function setDiscount(Money|int|null $discount): self
    {
        if ($discount instanceof Money) {
            [$amount, $currency] = ValueHelper::moneyToIntCurrency($discount);
            $this->discount = $amount;
            return $this;
        }

        $this->discount = $discount;
        return $this;
    }

    public function getVat(bool $useObject = false): Money|int|null
    {
        return $useObject ? ValueHelper::intToMoney($this->vat, $this->getVariant()?->getOffer()?->getCurrency()?->getIsoCode()) : $this->vat;
    }

    public function setVat(Money|int|null $vat): self
    {
        if ($vat instanceof Money) {
            [$amount, $currency] = ValueHelper::moneyToIntCurrency($vat);
            $this->vat = $amount;
            return $this;
        }

        $this->vat = $vat;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * @param string|null $unit
     * @return Line
     */
    public function setUnit(?string $unit): Line
    {
        $this->unit = $unit;
        return $this;
    }

    public function getQuantity(bool $useObject = false): Money|int|null
    {
        return $useObject ? ValueHelper::intToMoney($this->quantity, $this->getVariant()?->getOffer()?->getCurrency()?->getIsoCode()) : $this->quantity;
    }

    public function setQuantity(Money|int|null $quantity): self
    {
        if ($quantity instanceof Money) {
            [$amount, $currency] = ValueHelper::moneyToIntCurrency($quantity);
            $this->quantity = $amount;
            return $this;
        }

        $this->quantity = $quantity;
        return $this;
    }


}
