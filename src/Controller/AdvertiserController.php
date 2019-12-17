<?php

namespace App\Controller;

use App\Entity\Advertiser;
use App\Form\AdvertiserType;
use App\Repository\AdvertiserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/advertiser")
 */
class AdvertiserController extends AbstractController
{
    /**
     * @Route("/", name="advertiser_index", methods={"GET"})
     */
    public function index(AdvertiserRepository $advertiserRepository): Response
    {
        return $this->render('advertiser/index.html.twig', [
            'advertisers' => $advertiserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="advertiser_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $advertiser = new Advertiser();
        $form = $this->createForm(AdvertiserType::class, $advertiser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($advertiser);
            $entityManager->flush();

            return $this->redirectToRoute('advertiser_index');
        }

        return $this->render('advertiser/new.html.twig', [
            'advertiser' => $advertiser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="advertiser_show", methods={"GET"})
     */
    public function show(Advertiser $advertiser): Response
    {
        return $this->render('advertiser/show.html.twig', [
            'advertiser' => $advertiser,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="advertiser_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Advertiser $advertiser): Response
    {
        $form = $this->createForm(AdvertiserType::class, $advertiser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('advertiser_index');
        }

        return $this->render('advertiser/edit.html.twig', [
            'advertiser' => $advertiser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="advertiser_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Advertiser $advertiser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$advertiser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($advertiser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('advertiser_index');
    }
}
