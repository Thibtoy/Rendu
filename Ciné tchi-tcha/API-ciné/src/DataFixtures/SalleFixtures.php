<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Salle;

class SalleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Créée 5 salles dans la base
    for($i = 1; $i <= 5; $i++){
        $salle = new Salle();
        $salle->setNumeros($i)
              ->setPlaces(100+($i*20));
       
      $manager->persist($salle);

    }

        $manager->flush();
    }
}
