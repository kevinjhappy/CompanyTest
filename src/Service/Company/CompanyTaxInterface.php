<?php

namespace App\Service\Company;

interface CompanyTaxInterface
{

    public function calculateTax(float $revenueFigure): float;

}