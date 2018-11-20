<?php

declare(strict_types=1);

namespace App\Service\Company;

use App\Entity\Company\Company;
use App\Service\Company\CompanyTaxInterface;

class CompanyService implements CompanyTaxInterface
{

    public function calculateTax(Company $company, float $revenueFigure): float
    {
        return $revenueFigure * $company->getTaxAmount();
    }
}