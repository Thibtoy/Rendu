<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Langue;

class ELangueFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = ['VF','VO','VOstFR'];
        $length = sizeof($data);
        for($i = 0; $i < $length; $i++) {
            $langue = new Langue();
            $langue->setNom($data[$i]);

          $manager->persist($langue);
        }
        $manager->flush();
    }
}
