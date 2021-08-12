<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\AdminBookFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/book", name="book_")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/admin/create", name="admin_create")
     */
    public function create(Request $request,
                          EntityManagerInterface $entityManager): Response
    {
        $book = new Book();
        $book->setIsPublished(true);

        $bookForm = $this->createForm(AdminBookFormType::class, $book);
        $bookForm->handleRequest($request);

        if ($bookForm->isSubmitted() && $bookForm->isValid())
        {
            $entityManager->persist($book);
            $entityManager->flush();
            return $this->redirectToRoute('main_home');
        }

        return $this->render('book/create.html.twig', [
            'bookForm' => $bookForm->createView(),
        ]);
    }
}
