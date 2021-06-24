<?php
declare(strict_types=1);

namespace LSB\OfferBundle\Manager;

use LSB\OfferBundle\Entity\LineInterface;
use LSB\OfferBundle\Factory\LineFactoryInterface;
use LSB\OfferBundle\Repository\LineRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
* Class LineManager
* @package LSB\OfferBundle\Manager
*/
class LineManager extends BaseManager
{

    /**
     * LineManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param LineFactoryInterface $factory
     * @param LineRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        LineFactoryInterface $factory,
        LineRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return LineInterface|object
     */
    public function createNew(): LineInterface
    {
        return parent::createNew();
    }

    /**
     * @return LineFactoryInterface|FactoryInterface
     */
    public function getFactory(): LineFactoryInterface
    {
        return parent::getFactory();
    }

    /**
     * @return LineRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): LineRepositoryInterface
    {
        return parent::getRepository();
    }
}
