<?php

// src/Controller/NoteController.php
namespace App\Controller;

use App\Repository\NoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class NoteController extends AbstractController
{
    // Route pour afficher toutes les notes
    #[Route('/notes', name: 'app_note_all', methods: ['GET'])]
    #[IsGranted('ROLE_USER')] // Protection par rôle
    public function allNotes(NoteRepository $noteRepository): Response
    {
        $notes = $noteRepository->findAll(); // Récupérer toutes les notes
        return $this->render('note/all_notes.html.twig', [
            'notes' => $notes,
        ]);
    }

    // Route pour afficher une note par son slug
    #[Route('/notes/n/{slug}', name: 'app_note_show', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function showNote(string $slug, NoteRepository $noteRepository): Response
    {
        $note = $noteRepository->findOneBy(['slug' => $slug]);
        return $this->render('note/show.html.twig', [
            'note' => $note,
        ]);
    }

    // Route pour créer une nouvelle note
    #[Route('/notes/new', name: 'app_note_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function createNote(): Response
    {
        // Logique de création de note
        return $this->render('note/new.html.twig');
    }
}
