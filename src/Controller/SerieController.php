<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Form\AdminSerieFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/serie", name="serie_")
 */
class SerieController extends AbstractController
{
    /**
     * @Route("/admin/create", name="admin_create")
     */
    public function create(Request $request,
                           EntityManagerInterface $entityManager): Response
    {
        $serie = new Serie();

        $serieForm = $this->createForm(AdminSerieFormType::class, $serie);
        $serieForm->handleRequest($request);

        if ($serieForm->isSubmitted() && $serieForm->isValid())
        {
            $entityManager->persist($serie);
            $entityManager->flush();
            return $this->redirectToRoute('main_home');
        }

        return $this->render('serie/create.html.twig', [
            'serieForm' => $serieForm->createView(),
        ]);
    }
}
