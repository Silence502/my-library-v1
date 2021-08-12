<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AdminAuthorFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/author", name="author_")
 */
class AuthorController extends AbstractController
{
    /**
     * @Route("/admin/create", name="admin_create")
     */
    public function create(Request $request,
                           EntityManagerInterface $entityManager): Response
    {
        $author = new Author();

        $authorForm = $this->createForm(AdminAuthorFormType::class, $author);
        $authorForm->handleRequest($request);

        if ($authorForm->isSubmitted() && $authorForm->isValid())
        {
            $entityManager->persist($author);
            $entityManager->flush();
            return $this->redirectToRoute('main_home');
        }

        return $this->render('author/create.html.twig', [
            'authorForm' => $authorForm->createView(),
        ]);
    }
}
