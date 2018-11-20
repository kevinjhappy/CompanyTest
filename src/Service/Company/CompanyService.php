<?php

declare(strict_types=1);

namespace App\Service\Company;

use App\Entity\Company\Company;
use App\Service\Company\CompanyTaxInterface;

class CompanyService implements CompanyTaxInterface
{

    private $companyEntity;

    public function __construct(Company $company)
    {
        $this->companyEntity = $company;
    }

    public function calculateTax(float $revenueFigure): float
    {
        return $revenueFigure * $this->companyEntity->getTaxAmount();
    }
}