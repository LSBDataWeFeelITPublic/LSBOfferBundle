<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use LSB\ProductBundle\Entity\ProductInterface;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\PositionTrait;
use LSB\UtilityBundle\Traits\UuidTrait;

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
     * @var VariantInterface
     * @ORM\ManyToOne(targetEntity="LSB\OfferBundle\Entity\VariantInterface", inversedBy="lines")
     * @ORM\JoinColumn(name="variant_id", referencedColumnName="id", nullable=false)
     */
    protected VariantInterface $variant;

    /**
     * @var ProductInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\ProductBundle\Entity\ProductInterface")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=true)
     */
    protected ?ProductInterface $product;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected string $name;

    /**
     * @ORM\Column(type="decimal", nullable=true, scale=2)
     */
    protected ?float $price;

    /**
     * @ORM\Column(type="decimal", nullable=true, scale=2)
     */
    protected ?float $discount;

    /**
     * @ORM\Column(type="decimal", nullable=true, scale=2)
     */
    protected ?float $vat;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected ?string $unit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected ?int $quantity;


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

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return Line
     */
    public function setPrice(?float $price): Line
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float|null $discount
     * @return Line
     */
    public function setDiscount(?float $discount): Line
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getVat(): ?float
    {
        return $this->vat;
    }

    /**
     * @param float|null $vat
     * @return Line
     */
    public function setVat(?float $vat): Line
    {
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

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return Line
     */
    public function setQuantity(?int $quantity): Line
    {
        $this->quantity = $quantity;
        return $this;
    }
}
