<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\OfferBundle\Entity\Line;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class LineRepository
 * @package LSB\OfferBundle\Repository
 */
class LineRepository extends BaseRepository implements LineRepositoryInterface
{
    use PaginationRepositoryTrait;

    /**
     * LineRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? Line::class);
    }

}
