<?php

namespace App\Controller;

use App\Entity\Montre;
use App\Form\MontreType;
use App\Repository\MontreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/montre")
 */
class MontreController extends AbstractController
{
    /**
     * @Route("/", name="montre_index", methods={"GET"})
     */
    public function index(MontreRepository $montreRepository): Response
    {
        return $this->render('montre/index.html.twig', [
            'montres' => $montreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="montre_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $montre = new Montre();
        $form = $this->createForm(MontreType::class, $montre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($montre);
            $entityManager->flush();

            return $this->redirectToRoute('montre_index');
        }

        return $this->render('montre/new.html.twig', [
            'montre' => $montre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="montre_show", methods={"GET"})
     */
    public function show(Montre $montre): Response
    {
        return $this->render('montre/show.html.twig', [
            'montre' => $montre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="montre_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Montre $montre): Response
    {
        $form = $this->createForm(MontreType::class, $montre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('montre_index');
        }

        return $this->render('montre/edit.html.twig', [
            'montre' => $montre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="montre_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Montre $montre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$montre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($montre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('montre_index');
    }
}
