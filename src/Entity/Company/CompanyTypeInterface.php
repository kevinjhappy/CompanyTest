<?php

namespace App\Entity\Company;

interface CompanyTypeInterface {

    public function calculateTax(float $revenueFigure): float ;

    public function getTypeName(): string ;

}