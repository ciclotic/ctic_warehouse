<?php
namespace CTIC\Warehouse\Warehouse\Domain;

use CTIC\App\Company\Domain\Company;
use CTIC\App\Base\Domain\EntityInterface;
use CTIC\App\Base\Domain\IdentifiableInterface;

interface WarehouseInterface extends IdentifiableInterface, EntityInterface
{
    public function getName();
    public function getAddress();
    public function getPostalCode();
    public function getTown();
    public function getCountry();
    public function getCompany();
    public function setCompany(Company $company): bool;
    public function isEnabled();
}