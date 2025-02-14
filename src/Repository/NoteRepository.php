<?php

namespace App\Repository;

use App\Entity\Note;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Note>
 */
class NoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Note::class);
    }

    // Exemple d'une méthode personnalisée
    public function findByIsPublic(bool $isPublic): array
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.isPublic = :val')
            ->setParameter('val', $isPublic)
            ->getQuery()
            ->getResult();
    }
}

