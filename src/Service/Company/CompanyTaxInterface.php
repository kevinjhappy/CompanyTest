<?php

namespace App\Service\Company;

use App\Entity\Company\Company;


interface CompanyTaxInterface
{

    public function calculateTax(Company $company, float $revenueFigure): float;

}