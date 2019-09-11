<?php
namespace CTIC\Warehouse\Warehouse\Domain;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use CTIC\App\Base\Domain\IdentifiableTrait;
use CTIC\Warehouse\Warehouse\Domain\Validation\WarehouseValidation;
use CTIC\App\Company\Domain\Company;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="CTIC\Warehouse\Warehouse\Infrastructure\Repository\WarehouseRepository")
 */
class Warehouse implements WarehouseInterface
{
    use IdentifiableTrait;
    use WarehouseValidation;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @var string
     */
    public $name;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    public $address;

    /**
     * @ORM\Column(type="string", length=20)
     *
     * @var string
     */
    public $postalCode;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @var string
     */
    public $town;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @var string
     */
    public $country;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    public $enabled;

    /**
     * @ORM\ManyToOne(targetEntity="CTIC\App\Company\Domain\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     *
     * @var Company
     */
    private $company = null;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return Company|null
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     *
     * @return bool
     */
    public function setCompany(Company $company): bool
    {
        if (get_class($company) != Company::class) {
            return false;
        }

        $this->company = $company;

        return true;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
    }
}