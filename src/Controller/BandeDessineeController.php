<?php

namespace App\Controller;

use App\Entity\BandeDessinee;
use App\Form\BandeDessineeType;
use App\Repository\BandeDessineeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bande/dessinee")
 */
class BandeDessineeController extends AbstractController
{
    /**
     * @Route("/", name="bande_dessinee_index", methods={"GET"})
     */
    public function index(BandeDessineeRepository $bandeDessineeRepository): Response
    {
        return $this->render('bande_dessinee/index.html.twig', [
            'bande_dessinees' => $bandeDessineeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bande_dessinee_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bandeDessinee = new BandeDessinee();
        $form = $this->createForm(BandeDessineeType::class, $bandeDessinee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bandeDessinee);
            $entityManager->flush();

            return $this->redirectToRoute('bande_dessinee_index');
        }

        return $this->render('bande_dessinee/new.html.twig', [
            'bande_dessinee' => $bandeDessinee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bande_dessinee_show", methods={"GET"})
     */
    public function show(BandeDessinee $bandeDessinee): Response
    {
        return $this->render('bande_dessinee/show.html.twig', [
            'bande_dessinee' => $bandeDessinee,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bande_dessinee_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BandeDessinee $bandeDessinee): Response
    {
        $form = $this->createForm(BandeDessineeType::class, $bandeDessinee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bande_dessinee_index');
        }

        return $this->render('bande_dessinee/edit.html.twig', [
            'bande_dessinee' => $bandeDessinee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bande_dessinee_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BandeDessinee $bandeDessinee): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bandeDessinee->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bandeDessinee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bande_dessinee_index');
    }
}
