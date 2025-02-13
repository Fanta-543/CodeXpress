<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    public function listCategories(): Response
    {
        return $this->render('category/list.html.twig');
    }

    #[Route('/category/{title}', name: 'app_category')]
    public function showCategory(string $title): Response
    {
        return $this->render('category/show.html.twig', ['title' => $title]);
    }
}
