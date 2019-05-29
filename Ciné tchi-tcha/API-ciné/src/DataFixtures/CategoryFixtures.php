<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = ['Action', 'Drame','Comédie','Animation','Horreur'];
        $length = sizeof($data);
        for($i = 0; $i < $length; $i++) {
            $category = new Category();
            $category->setNom($data[$i]);

          $manager->persist($category);
        }

        $manager->flush();
    }
}
