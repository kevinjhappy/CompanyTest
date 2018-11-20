<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Embeddable
 */
class Address
{
    /** @Column(type = "string", length=120) */
    private $street;

    /** @Column(type = "string", length=10) */
    private $postalCode;

    /** @Column(type = "string", length=50) */
    private $city;

    /** @Column(type = "string", length=50) */
    private $country;

    public function __construct(
        string $street,
        string $postacCode,
        string $city,
        string $country
    )
    {
        $this->street = $street;
        $this->postalCode = $postacCode;
        $this->city = $city;
        $this->country = $country;
    }

}