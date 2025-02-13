<?php

namespace App\Repository;

use App\Entity\Note;  // Changer de "Notes" à "Note" pour correspondre à l'entité
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Note>  // Changement de "Notes" à "Note"
 */
class NoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Note::class);  // Changer "Notes" en "Note"
    }

    // Exemple d'une méthode personnalisée pour rechercher par un champ spécifique
    // public function findByExampleField($value): array
    // {
    //     return $this->createQueryBuilder('n')
    //         ->andWhere('n.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('n.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

    // public function findOneBySomeField($value): ?Note
    // {
    //     return $this->createQueryBuilder('n')
    //         ->andWhere('n.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getOneOrNullResult()
    //     ;
    // }
}
