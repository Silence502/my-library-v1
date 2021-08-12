<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use App\Repository\IllustratorRepository;
use App\Repository\PublisherRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home(): Response
    {
        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     * @Route("/test", name="test")
     */
    public function test(Request $request,
                         EntityManagerInterface $entityManager,
                         AuthorRepository $authorRepository,
                         IllustratorRepository $illustratorRepository,
                         PublisherRepository $publisherRepository,
                         BookRepository $bookRepository): Response
    {
        $authors = $authorRepository->findAll();
        $illustrators = $illustratorRepository->findAll();
        $publishers = $publisherRepository->findAll();
        $books = $bookRepository->findAll();

        return $this->render('main/test.html.twig', [
            'authors' => $authors,
            'illustrators' => $illustrators,
            'publishers' => $publishers,
            'books' => $books,
        ]);
    }
}
