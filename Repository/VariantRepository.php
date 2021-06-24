<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\OfferBundle\Entity\Variant;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class VariantRepository
 * @package LSB\OfferBundle\Repository
 */
class VariantRepository extends BaseRepository implements VariantRepositoryInterface
{
    use PaginationRepositoryTrait;

    /**
     * VariantRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? Variant::class);
    }

}
