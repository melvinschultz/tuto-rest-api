<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class PlaceController extends Controller
{
//    public function indexAction($name)
//    {
//        return $this->render('', array('name' => $name));
//    }

    /**
     * @Route("/places", name="places_list")
     * @Method({"GET"})
     */
    public function getPlacesAction(Request $request)
    {
        return new JsonResponse([
            new Place("Tour Eiffel", "5 Avenue Anatole France, 75007 Paris"),
            new Place("Mont-Saint-Michel", "50170 Le Mont-Saint-Michel"),
            new Place("Château de Versailles", "Place d'Armes, 78000 Versailles"),
        ]);
    }
}
