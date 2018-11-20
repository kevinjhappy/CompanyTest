<?php

declare(strict_types=1);

namespace App\Entity\Company;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Company\CompanyTypeInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company implements CompanyTypeInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $uuid;

    /**
     * @ORM\Column(type="integer", length=14)
     */
    private $siretNumber;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $street;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $postCode;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $cityName;

    /**
     * @ManyToOne(targetEntity="CompanyType", inversedBy="name")
     * @JoinColumn(name="type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @ManyToOne(targetEntity="CompanyType", inversedBy="taxAmount")
     * @JoinColumn(name="taxAmount_id", referencedColumnName="id")
     */
    private $taxAmount;

    public function getSiretNumber(): int
    {
        return $this->siretNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFullAddress(): ?string
    {
        return "{$this->street} {$this->postCode} {$this->cityName}";
    }

    public function getTypeName(): string
    {
        return $this->type;
    }

    public function calculateTax(float $revenueFigure): float
    {
        return $revenueFigure * $this->$taxAmount;
    }

}
