<?php

namespace Tests\App\Entity\Company;

use PHPUnit\Framework\TestCase;
use App\Entity\Company\Company;
use App\Service\Company\CompanyService;
use App\Entity\Address;

class CompanyTest extends TestCase
{

    public function companyProvider()
    {
        return [
            [
                'name1', 
                '12345', 
                'SAS', 
                new Address(
                    "fake street", 
                    "12345", 
                    "FAKE", 
                    "country"
                ), 
                0.33,
                345000, 
                113850
            ],
            [
                'name2', 
                '12345', 
                'FREELANCER',
                null,
                0.25,
                345000, 
                86250
            ]
        ];
    }

    /**
     * @dataProvider companyProvider
     */
    public function testcalculateTax($name, $siret, $type, $address, $taxAmount, $annualRevenueFigure, $tax)
    {
        $company = new Company($siret, $name, $type, $address, $taxAmount);

        $companyService = new CompanyService($company);

        $calculatedTax = $companyService->calculateTax($annualRevenueFigure);

        $this->assertEquals($calculatedTax, $tax);
    }
}