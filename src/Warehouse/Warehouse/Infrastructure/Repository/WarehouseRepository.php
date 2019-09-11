<?php
namespace CTIC\Warehouse\Warehouse\Infrastructure\Repository;

use CTIC\Warehouse\Warehouse\Domain\Warehouse;
use CTIC\App\Base\Infrastructure\Repository\EntityRepository;

class WarehouseRepository extends EntityRepository
{
    /**
     * @return Warehouse[]
     */
    public function findAllOrderedByName(): array
    {
        $qb = $this->createQueryBuilder('r')
            ->orderBy('r.name', 'ASC')
            ->getQuery();

        return $qb->execute();
    }

    /**
     * @return Warehouse
     *
     * @throws
     */
    public function findOneRandom(): Warehouse
    {
        $qb = $this->createQueryBuilder('r')
            ->orderBy('r.name', 'ASC')
            ->getQuery();

        /** @var Warehouse $warehouse */
        $warehouse = $qb->setMaxResults(1)->getOneOrNullResult();

        return $warehouse;
    }
}