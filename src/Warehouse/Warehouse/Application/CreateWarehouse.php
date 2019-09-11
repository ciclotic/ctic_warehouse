<?php
namespace CTIC\Warehouse\Warehouse\Application;

use CTIC\App\Company\Domain\Company;
use CTIC\App\Base\Application\CreateInterface;
use CTIC\App\Base\Domain\Command\CommandInterface;
use CTIC\App\Base\Domain\EntityInterface;
use CTIC\Warehouse\Warehouse\Domain\Command\WarehouseCommand;
use CTIC\Warehouse\Warehouse\Domain\Warehouse;

class CreateWarehouse implements CreateInterface
{
    /**
     * @param CommandInterface|WarehouseCommand $command
     * @return EntityInterface|Warehouse
     */
    public static function create(CommandInterface $command): EntityInterface
    {
        $warehouse = new Warehouse();
        $warehouse->setId($command->id);
        $warehouse->name = (empty($command->name))? '' : $command->name;
        $warehouse->address = $command->address;
        $warehouse->postalCode = $command->postalCode;
        $warehouse->town = $command->town;
        $warehouse->country = $command->country;
        $warehouse->enabled = (empty($command->enabled))? false : true;
        if (!empty($command->company) && get_class($command->company) == Company::class) {
            $warehouse->setCompany($command->company);
        }

        return $warehouse;
    }
}