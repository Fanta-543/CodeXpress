<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Note;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR'); // Crée un générateur de données aléatoires en français

        // Tableau des catégories avec leurs icônes
        $categories = [
            'HTML' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/html5/html5-plain.svg',
            'CSS' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/css3/css3-plain.svg',
            'JavaScript' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/javascript/javascript-plain.svg',
            'PHP' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-plain.svg',
            'SQL' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/postgresql/postgresql-plain.svg',
            'JSON' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/json/json-plain.svg',
            'Python' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/python/python-plain.svg',
            'Ruby' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/ruby/ruby-plain.svg',
            'C++' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/cplusplus/cplusplus-plain.svg',
            'Go' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/go/go-wordmark.svg',
        ];

        // Créer 10 utilisateurs
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setUsername($faker->userName)
                ->setEmail($faker->email)
                ->setPassword(password_hash('password', PASSWORD_BCRYPT)) 
                ->setRoles(['ROLE_USER']);
            $manager->persist($user);

            // Créer 10 notes pour chaque utilisateur
            for ($j = 0; $j < 10; $j++) {
                $note = new Note();
                $note->setTitle($faker->sentence)
                    ->setContent($faker->paragraph)
                    ->setCreatedAt(new \DateTimeImmutable($faker->dateTimeThisYear->format('Y-m-d H:i:s')))
                    ->setUpdatedAt(new \DateTimeImmutable($faker->dateTimeThisYear->format('Y-m-d H:i:s')))
                    ->setIsPublic($faker->boolean) // Statut aléatoire pour public/privé
                    ->setUser($user);

                // Créer une catégorie aléatoire pour chaque note
                $categoryName = array_rand($categories);
                $category = new Category();
                $category->setName($categoryName)
                    ->setIcon($categories[$categoryName]);

                $note->setCategory($category);

                $manager->persist($category);
                $manager->persist($note);
            }
        }

        $manager->flush(); // Sauvegarder toutes les entités dans la base de données
    }
}
