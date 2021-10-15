<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Model;

class ConvertOptions
{

    public function __construct(protected array $variantIDs = [])
    {
    }

    /**
     * Get ids of offer variants which should be used in conversion process
     * @return array
     */
    public function getVariantIDs(): array
    {
        return $this->variantIDs;
    }

    public function addVariantID(int $variantID): ConvertOptions
    {
        if (!in_array($variantID, $this->variantIDs)) {
            $this->variantIDs[] = $variantID;
        }

        return $this;
    }

}
