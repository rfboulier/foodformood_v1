<?php

namespace App\DataFixtures;

use App\Entity\Recommandation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $recommandation = new Recommandation();
        $recommandation->setTitle("Les Ogres");
        $recommandation->setDescription("Un film de Léa Fehner");
        $recommandation->setType('Film');
        $recommandation->setLink('https://www.telerama.fr/cinema/films/les-ogres,504770.php');
        $recommandation->setImageUrl('LesOgres.jpeg');

        $manager->persist($recommandation);
        $manager->flush();
    }
}
