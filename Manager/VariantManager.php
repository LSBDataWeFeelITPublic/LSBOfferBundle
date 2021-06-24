<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Manager;

use LSB\OfferBundle\Entity\VariantInterface;
use LSB\OfferBundle\Factory\VariantFactoryInterface;
use LSB\OfferBundle\Repository\VariantRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
* Class VariantManager
* @package LSB\OfferBundle\Manager
*/
class VariantManager extends BaseManager
{

    /**
     * VariantManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param VariantFactoryInterface $factory
     * @param VariantRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        VariantFactoryInterface $factory,
        VariantRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return VariantInterface|object
     */
    public function createNew(): VariantInterface
    {
        return parent::createNew();
    }

    /**
     * @return VariantFactoryInterface|FactoryInterface
     */
    public function getFactory(): VariantFactoryInterface
    {
        return parent::getFactory();
    }

    /**
     * @return VariantRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): VariantRepositoryInterface
    {
        return parent::getRepository();
    }
}
