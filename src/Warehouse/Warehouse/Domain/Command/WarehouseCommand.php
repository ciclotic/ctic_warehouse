<?php
namespace CTIC\Warehouse\Warehouse\Domain\Command;

use CTIC\App\Base\Domain\Command\CommandInterface;
use CTIC\App\Company\Domain\Company;

class WarehouseCommand implements CommandInterface
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $postalCode;

    /**
     * @var string
     */
    public $town;

    /**
     * @var string
     */
    public $country;

    /**
     * @var int
     */
    public $warehouse;

    /**
     * @var bool
     */
    public $enabled;

    /**
     * @var Company
     */
    public $company;
}