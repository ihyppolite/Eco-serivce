<?php

namespace App\Controller;

use App\Form\ContacterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContacterController extends AbstractController
{
    #[Route('/contacter', name: 'app_contacter')]
    public function index(Request $request): Response
    {

        $form = $this->createForm(ContacterType::class);
        $form->handleRequest($request);


        return $this->render('contacter/index.html.twig', [
            'contacte_form' => $form->createView(),
        ]);
    }
}
