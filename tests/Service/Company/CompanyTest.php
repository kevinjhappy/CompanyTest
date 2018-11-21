<?php

namespace Tests\App\Entity\Company;

use PHPUnit\Framework\TestCase;
use App\Entity\Company\Company;
use App\Service\Company\CompanyService;
use App\Entity\Address;

class CompanyTest extends TestCase
{

    /**
     * @dataProvider companyProvider
     */
    public function testcalculateTax($name, $siret, $type, $address, $taxAmount, $annualRevenueFigure, $tax)
    {
        $company = new Company($siret, $name, $type, $address, $taxAmount);

        $calculatedTax = (new CompanyService())->calculateTax($company, $annualRevenueFigure);

        $this->assertEquals($calculatedTax, $tax);
    }

    /**
     * @dataProvider dataExpectedException
     * @expectedException \App\Exception\InvalidCompanyException
     */
    public function testIfComPanyNotFreelancerAndAddressEmpty($name, $siret, $type, $address, $taxAmount)
    {
        $company = new Company($siret, $name, $type, $address, $taxAmount);
    }

    /**
     * @dataProvider dataExpectedError
     * @expectedException \TypeError
     */
    public function testIfCompanyConstructorNotValid($name, $siret, $type, $address, $taxAmount)
    {
        $company = new Company($siret, $name, $type, $address, $taxAmount);
    }


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
                '06789', 
                'FREELANCER',
                null,
                0.25,
                345000,
                86250
            ]
        ];
    }

    public function dataExpectedException()
    {
        return [
            [
                'name1', 
                '12345', 
                'SAS', 
                null,
                0.33
            ]
        ];
    }

    public function dataExpectedError()
    {
        return [
            [
                null, 
                '12345', 
                'FREELANCER', 
                null,
                0.33
            ],
            [
                null, 
                '12345', 
                'SAS', 
                new Address(
                    "fake street", 
                    "12345", 
                    "FAKE", 
                    "country"
                ),
                0.33
            ]
        ];
    }
}