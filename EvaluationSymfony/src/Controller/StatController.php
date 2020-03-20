<?php

namespace App\Controller;

use App\Entity\Stat;
use App\Form\StatType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/stat")
 */
class StatController extends AbstractController
{
    /**
     * @Route("/", name="stat")
     */
    public function index()
    {
        return $this->render('stat/index.html.twig', [
            'controller_name' => 'StatController',
        ]);
    }
    /**
     * @Route("/new",name="stat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $stat = new Stat();
        $form = $this->createForm(StatType::class, $stat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stat = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stat);
            $entityManager->flush();

            return $this->redirectToRoute('country_index');
        }

        return $this->render('country/new.html.twig', [
            'stat' => $stat,
            'form' => $form->createView(),
        ]);
    }
}
