<?php

declare(strict_types=1);

namespace App\Entity\Company;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class CompanyType
{
    /**
     * @ORM\id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Company", mappedBy="type")
     * @ORM\Column(type="string", length=10)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Company", mappedBy="taxAmount")
     * @ORM\Column(type="float")
     */
    private $taxAmount;
}