<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController 
{
    /**
     * @Route("/contact", name="contact_index")
     */
    public function index() {
        return $this->render('/contact/index.html.twig', [
            'controller_name' => 'Contactez-moi'
        ]);
    }
}