<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Realisation;

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
     * @Route("/{id}", methods={"GET"}, requirements={"id"="\d+"}, name="show", )
     */
    public function show(int $id): Response
    {
        return $this->render('realisation/show.html.twig', [
            'id' => $id
        ]);
    }
}