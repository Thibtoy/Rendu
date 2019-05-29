<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Film;
use App\Entity\Category;
use App\Entity\Langue;

class FilmFixtures extends Fixture
{
    private function dateToInt($month) {
         if ($month == "Jan") {
            return 0x01;
        }
         if ($month == "Feb") {
            return 0x02;
        }
         if ($month == "Mar") {
            return 0x03;
        }
         if ($month == "Apr") {
            return 0x04;
        }
         if ($month == "May") {
            return 0x05;
        }
         if ($month == "Jun") {
            return 0x06;
        }
         if ($month == "Jul") {
            return 0x07;
        }
         if ($month == "Aug") {
            return 0x08;
        }
         if ($month == "Sep") {
            return 0x09;
        }
         if ($month == "Oct") {
            return 0x10;
        }
         if ($month == "Nov") {
            return 0x11;
        }
         if ($month == "Dec") { 
            return 0x12;
        }
    }
    private function randomize(int $n){
      return rand(0, $n);
    }
    
    public function load(ObjectManager $manager)
    {
      $category = $manager->getRepository(Category::class)->findAll();
      $langue = $manager->getRepository(Langue::class)->findAll();
      $data = ["http://www.omdbapi.com/?t=Batman&apikey=dfc30293","http://www.omdbapi.com/?t=Avengers&apikey=dfc30293","http://www.omdbapi.com/?t=Superman&apikey=dfc30293","http://www.omdbapi.com/?t=Detective+Pikachu&apikey=dfc30293","http://www.omdbapi.com/?t=Blade+Runner+2049&apikey=dfc30293","http://www.omdbapi.com/?t=the+game&apikey=dfc30293","http://www.omdbapi.com/?t=He+got+game&apikey=dfc30293",
      "http://www.omdbapi.com/?t=matrix&apikey=dfc30293","http://www.omdbapi.com/?t=john+wick&apikey=dfc30293","http://www.omdbapi.com/?t=spider-man&apikey=dfc30293","http://www.omdbapi.com/?t=iron+man&apikey=dfc30293","http://www.omdbapi.com/?t=Aladdin&y=2019&apikey=dfc30293","http://www.omdbapi.com/?t=Space+Jam&apikey=dfc30293","http://www.omdbapi.com/?t=Forrest+gump&apikey=dfc30293","http://www.omdbapi.com/?t=scarface&apikey=dfc30293","http://www.omdbapi.com/?t=battle+royale&apikey=dfc30293"];
      $length = sizeof($data);
      for($i = 0; $i < $length; $i++){
      $content = file_get_contents($data[$i]);
      $result  = json_decode($content);
      $dates = explode(" ", $result->Released);
      $date = new \DateTime();
      $dates[1] = $this->dateToInt($dates[1]);
      $date->setDate($dates[2], $dates[1], $dates[0]);
      $date->setTime(0x00,0x00,0x00);

            $film = new Film();
            $film->setTitre($result->Title)
                 ->setSynopsis($result->Plot)
                 ->setDuree(intval($result->Runtime))
                 ->setBandeAnnonce($result->Poster)
                 ->setDateDeSortie($date)
                 ->setRealisateur($result->Director)
                 ->setActeurs($result->Actors)
                 ->setNationalite($result->Country)
                 ->addCategory($category[$this->randomize(4)])
                 ->addLangue($langue[$this->randomize(2)]);
      
              $manager->persist($film);
      }  
        
        $manager->flush();
    }

    
 }
