<?php

namespace App\DataFixtures;

use App\Entity\Recommandation;
use App\Entity\User;
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

        // USER PAR DEFAUT
        $user = new User();
        $user->setUsername("rboulier");

// générer un mot de passe hashé
        $hashedPassword = $this->passwordHasher->hashPassword($user, "16-Avril2007");
        $user->setPassword($hashedPassword);

        $manager->persist($user);
        $manager->flush();
    }


}
