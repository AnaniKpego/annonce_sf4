<?php

namespace App\Controller;

use App\Entity\CampingCar;
use App\Form\CampingCarType;
use App\Repository\CampingCarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/camping/car")
 */
class CampingCarController extends AbstractController
{
    /**
     * @Route("/", name="camping_car_index", methods={"GET"})
     */
    public function index(CampingCarRepository $campingCarRepository): Response
    {
        return $this->render('camping_car/index.html.twig', [
            'camping_cars' => $campingCarRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="camping_car_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $campingCar = new CampingCar();
        $form = $this->createForm(CampingCarType::class, $campingCar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($campingCar);
            $entityManager->flush();

            return $this->redirectToRoute('camping_car_index');
        }

        return $this->render('camping_car/new.html.twig', [
            'camping_car' => $campingCar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="camping_car_show", methods={"GET"})
     */
    public function show(CampingCar $campingCar): Response
    {
        return $this->render('camping_car/show.html.twig', [
            'camping_car' => $campingCar,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="camping_car_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CampingCar $campingCar): Response
    {
        $form = $this->createForm(CampingCarType::class, $campingCar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('camping_car_index');
        }

        return $this->render('camping_car/edit.html.twig', [
            'camping_car' => $campingCar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="camping_car_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CampingCar $campingCar): Response
    {
        if ($this->isCsrfTokenValid('delete'.$campingCar->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($campingCar);
            $entityManager->flush();
        }

        return $this->redirectToRoute('camping_car_index');
    }
}
