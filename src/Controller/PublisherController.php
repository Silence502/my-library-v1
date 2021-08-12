<?php

namespace App\Controller;

use App\Entity\Publisher;
use App\Form\AdminPublisherFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/publisher", name="publisher_")
 */
class PublisherController extends AbstractController
{
    /**
     * @Route("/admin/create", name="admin_create")
     */
    public function create(Request $request,
                          EntityManagerInterface $entityManager): Response
    {
        $publisher = new Publisher();

        $publisherForm = $this->createForm(AdminPublisherFormType::class, $publisher);
        $publisherForm->handleRequest($request);

        if ($publisherForm->isSubmitted() && $publisherForm->isValid())
        {
            $entityManager->persist($publisher);
            $entityManager->flush();
            return $this->redirectToRoute('main_home');
        }

        return $this->render('publisher/create.html.twig', [
            'publisherForm' => $publisherForm->createView(),
        ]);
    }
}
