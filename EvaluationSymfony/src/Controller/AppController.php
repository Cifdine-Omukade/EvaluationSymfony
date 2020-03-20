<?php

namespace App\Controller;

use App\Entity\Country;
use App\Repository\CountryRepository;
use App\Repository\StatRepository;
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
    public function index(CountryRepository $countryRepository,StatRepository $statRepository)
    {
        
        $countries = $countryRepository->AlphabeticalOrder();
        foreach($countries as $country)
        {
            $countryStat = $country->getStat($statRepository->MyFindBy($country));
            return $countryStat;
        }
        
        
        
        return $this->render('app/index.html.twig', [
            'countries' => $countries,
            'stat' => $countryStat,
            

        ]);
    }
}
