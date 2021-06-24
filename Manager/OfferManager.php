<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Manager;

use LSB\OfferBundle\Entity\OfferInterface;
use LSB\OfferBundle\Factory\OfferFactoryInterface;
use LSB\OfferBundle\Repository\OfferRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
* Class OfferManager
* @package LSB\OfferBundle\Manager
*/
class OfferManager extends BaseManager
{

    /**
     * OfferManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param OfferFactoryInterface $factory
     * @param OfferRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        OfferFactoryInterface $factory,
        OfferRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return OfferInterface|object
     */
    public function createNew(): OfferInterface
    {
        return parent::createNew();
    }

    /**
     * @return OfferFactoryInterface|FactoryInterface
     */
    public function getFactory(): OfferFactoryInterface
    {
        return parent::getFactory();
    }

    /**
     * @return OfferRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): OfferRepositoryInterface
    {
        return parent::getRepository();
    }
}
