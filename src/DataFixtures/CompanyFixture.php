<?php

namespace App\DataFixtures;

use App\Entity\Company\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Address;

class CompanyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $typeArray = ['FREELANCER', 'SAS'];

        // this loop will add 10 companies
        for ($i = 0; $i < 10; $i++) {
            shuffle($typeArray);
            $company = new Company(
                $faker->ean13,
                $faker->name,
                $faker->type,
                $typeArray[0],
                new Address(
                    $faker->streetAddress,
                    $faker->postcode,
                    $faker->city,
                    $faker->country
                ),
                $faker->floatval
            );
            $manager->persist($company);
        }

        $manager->flush();
    }
}