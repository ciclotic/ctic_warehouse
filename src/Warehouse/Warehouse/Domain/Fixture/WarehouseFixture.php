<?php
namespace CTIC\Warehouse\Warehouse\Domain\Fixture;

use CTIC\App\Company\Infrastructure\Repository\CompanyRepository;
use CTIC\App\Company\Domain\Company;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use CTIC\Warehouse\Warehouse\Application\CreateWarehouse;
use CTIC\Warehouse\Warehouse\Domain\Command\WarehouseCommand;

class WarehouseFixture extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        /** @var CompanyRepository $companyRepository
         */
        $companyRepository = $manager->getRepository(Company::class);
        $companyDefecto = $companyRepository->findOneByTaxName('Defecto');

        $warehouseCommandGeneral = new WarehouseCommand();
        $warehouseCommandGeneral->name = 'General';
        $warehouseCommandGeneral->address = 'Introducir';
        $warehouseCommandGeneral->postalCode = '111111';
        $warehouseCommandGeneral->town = 'Introducir';
        $warehouseCommandGeneral->country = 'Introducir';
        $warehouseCommandGeneral->enabled = true;
        $warehouseCommandGeneral->company = $companyDefecto;
        $warehouseGeneral = CreateWarehouse::create($warehouseCommandGeneral);
        $manager->persist($warehouseGeneral);

        $manager->flush();
    }
}