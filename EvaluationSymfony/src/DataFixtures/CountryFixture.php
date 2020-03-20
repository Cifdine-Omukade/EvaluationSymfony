<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
class CountryFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for($i=0;$i<6;$i++)
        {
            $country = new Country;
            $country->setName($faker->country); //Tu voulais les 5 pays deja touché mais c'est plus rapide comme ca
            $manager->persist($country);
            
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
