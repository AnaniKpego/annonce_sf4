<?php

namespace App\Controller;

use App\Entity\Immobilier;
use App\Form\ImmobilierType;
use App\Repository\ImmobilierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/immobilier")
 */
class ImmobilierController extends AbstractController
{
    /**
     * @Route("/", name="immobilier_index", methods={"GET"})
     */
    public function index(ImmobilierRepository $immobilierRepository): Response
    {
        return $this->render('immobilier/index.html.twig', [
            'immobiliers' => $immobilierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="immobilier_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $immobilier = new Immobilier();
        $form = $this->createForm(ImmobilierType::class, $immobilier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($immobilier);
            $entityManager->flush();

            return $this->redirectToRoute('immobilier_index');
        }

        return $this->render('immobilier/new.html.twig', [
            'immobilier' => $immobilier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="immobilier_show", methods={"GET"})
     */
    public function show(Immobilier $immobilier): Response
    {
        return $this->render('immobilier/show.html.twig', [
            'immobilier' => $immobilier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="immobilier_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Immobilier $immobilier): Response
    {
        $form = $this->createForm(ImmobilierType::class, $immobilier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('immobilier_index');
        }

        return $this->render('immobilier/edit.html.twig', [
            'immobilier' => $immobilier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="immobilier_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Immobilier $immobilier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$immobilier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($immobilier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('immobilier_index');
    }
}
