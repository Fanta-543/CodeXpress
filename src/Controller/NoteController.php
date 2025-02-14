<?php

namespace App\Controller;

use App\Entity\Note;
use App\Form\NoteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\String\Slugger\SluggerInterface;

class NoteController extends AbstractController
{
    #[Route('/note/new', name: 'app_note_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        // Création d'un nouvel objet Note
        $note = new Note();

        // Création du formulaire
        $form = $this->createForm(NoteType::class, $note);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Génération du slug basé sur le titre
            $note->setSlug($slugger->slug($note->getTitle())->lower());

            // Sauvegarde de la note dans la base de données
            $em->persist($note);
            $em->flush();

            // Message flash et redirection
            $this->addFlash('success', 'Your note has been created!');
            return $this->redirectToRoute('app_note_show', ['slug' => $note->getSlug()]);
        }

        // Affichage du formulaire
        return $this->render('note/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/note/{slug}', name: 'app_note_show')]
    public function show(Note $note): Response
    {
        return $this->render('note/show.html.twig', [
            'note' => $note,
        ]);
    }
}
