<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\OfferBundle\Entity\Offer;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class OfferRepository
 * @package LSB\OfferBundle\Repository
 */
class OfferRepository extends BaseRepository implements OfferRepositoryInterface
{
    use PaginationRepositoryTrait;

    /**
     * OfferRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? Offer::class);
    }

}
