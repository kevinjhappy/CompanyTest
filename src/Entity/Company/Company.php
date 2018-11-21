<?php

declare(strict_types=1);

namespace App\Entity\Company;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use App\Exception\InvalidCompanyException;
use App\Entity\Address;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=14, unique=true)
     */
    private $siretNumber;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Embedded(class = "App\Entity\Address")
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity="CompanyType", inversedBy="name")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="CompanyType", inversedBy="taxAmount")
     * @ORM\JoinColumn(name="taxAmount_id", referencedColumnName="id")
     */
    private $taxAmount;

    public function __construct(
        int $siretNumber,
        string $name,
        string $type,
        Address $address = null,
        float $taxAmount
    ) {
        if (null === $address && $type !== 'FREELANCER'){
            Throw new InvalidCompanyException("Company other than 'FREELANCER' must have an address");
        }
        $this->siretNumber = $siretNumber;
        $this->name = $name;
        $this->type = $type;
        $this->address = $address;
        $this->taxAmount = $taxAmount;
        
    }

    public function getTaxAmount(): float
    {
        return $this->taxAmount;
    }

}
