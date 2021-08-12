<?php

namespace App\Controller;

use App\Entity\Illustrator;
use App\Form\AdminIllustratorFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/illustrator", name="illustrator_")
 */
class IllustratorController extends AbstractController
{
    /**
     * @Route("/admin/create", name="admin_create")
     */
    public function create(Request $request,
                          EntityManagerInterface $entityManager): Response
    {
        $illustrator = new Illustrator();

        $illustratorForm = $this->createForm(AdminIllustratorFormType::class, $illustrator);
        $illustratorForm->handleRequest($request);

        if ($illustratorForm->isSubmitted() && $illustratorForm->isValid())
        {
            $entityManager->persist($illustrator);
            $entityManager->flush();
            return $this->redirectToRoute('main_home');
        }

        return $this->render('illustrator/create.html.twig', [
            'illustratorForm' => $illustratorForm->createView(),
        ]);
    }
}
