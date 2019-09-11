<?php
declare(strict_types=1);

namespace CTIC\Warehouse\Warehouse\Test\Application;

use CTIC\Warehouse\Warehouse\Application\CreateWarehouse;
use CTIC\Warehouse\Warehouse\Domain\Command\WarehouseCommand;
use CTIC\Warehouse\Warehouse\Domain\Warehouse;
use PHPUnit\Framework\TestCase;

final class CreateWarehouseTest extends TestCase
{
    public function testCreateAssert()
    {
        $warehouseCommandRyu = new WarehouseCommand();
        $warehouseCommandRyu->name = 'ryu';
        $warehouseRyu = CreateWarehouse::create($warehouseCommandRyu);

        $this->assertEquals(Warehouse::class, get_class($warehouseRyu));
    }
}