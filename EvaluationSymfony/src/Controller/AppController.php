<?php

namespace App\Controller;

use App\Repository\CountryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/coronavirus")
 */
class AppController extends AbstractController
{
    /**
     * @Route("", name="app_index",methods={"GET"})
     */
    public function index(CountryRepository $countryRepository)
    {
        $countries = $countryRepository->findAll();
        return $this->render('app/index.html.twig', [
            'countries' => $countries
        ]);
    }
}
