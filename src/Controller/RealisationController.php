<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Realisation;
use App\Form\RealisationType;

/**
    * @Route("/realisations", name="realisation_")
    */
class RealisationController extends AbstractController 
{
    /**
    * @Route("/", name="index")
    * @return Response
    */
    public function index(): Response
    {
        $realisations = $this-> getDoctrine()
          ->getRepository(Realisation::class)
          ->findAll();

        return $this->render('realisation/index.html.twig', [
           'realisations' => $realisations,
        ]);
    }

    /**
     * @Route("/new", name="new")
     * @return Response
     */
    public function new(request $request): Response
    {
        $realisation = new Realisation();
        $form = $this->createForm(RealisationType::class, $realisation);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($realisation);
            $entityManager->flush();
            return $this->redirectToRoute('realisation_index');
        }
        return $this->render('realisation/new.html.twig', [
            "form" => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", methods={"GET"}, requirements={"id"="\d+"}, name="show", )
     */
    public function show(int $id): Response
    {
        return $this->render('realisation/show.html.twig', [
            'id' => $id
        ]);
    }
}