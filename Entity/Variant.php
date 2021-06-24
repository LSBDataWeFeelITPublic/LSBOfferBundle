<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\PositionTrait;
use LSB\UtilityBundle\Traits\UuidTrait;

/**
 * Class Variant
 * @package LSB\OfferBundle\Entity
 *
 * @MappedSuperclass
 */
class Variant implements VariantInterface
{
    use UuidTrait;
    use CreatedUpdatedTrait;
    use PositionTrait;

    /**
     * @var OfferInterface
     * @ORM\ManyToOne(targetEntity="LSB\OfferBundle\Entity\OfferInterface", inversedBy="variants")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="id", nullable=false)
     */
    protected OfferInterface $offer;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected string $name;

    /**
     * @var Collection|LineInterface[]
     * @ORM\OneToMany(targetEntity="LSB\OfferBundle\Entity\LineInterface", mappedBy="variant")
     */
    protected Collection $lines;


    /**
     * Variant constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->generateUuid();

        $this->lines = new ArrayCollection();
    }

    public function __clone()
    {
        if ($this->getId()) {
            $this->id = null;
        }

        $this->generateUuid($force = true);
    }

    /**
     * @return OfferInterface
     */
    public function getOffer(): OfferInterface
    {
        return $this->offer;
    }

    /**
     * @param OfferInterface $offer
     * @return Variant
     */
    public function setOffer(OfferInterface $offer): Variant
    {
        $this->offer = $offer;
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
     * @return Variant
     */
    public function setName(string $name): Variant
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Collection|LineInterface[]
     */
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * @param Collection|LineInterface[] $lines
     * @return Variant
     */
    public function setLines($lines)
    {
        $this->lines = $lines;
        return $this;
    }

}
