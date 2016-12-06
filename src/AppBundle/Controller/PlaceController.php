<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Place;

class PlaceController extends Controller
{
    // pas d'annotations de routage manuel de FOSRestBundle, on utilise ici le routage automatique du bundle
    public function getPlacesAction(Request $request)
    {
        $places = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Place')
            ->findAll();
        /* @var $places Place[] */

        $formatted = [];
        foreach ($places as $place) {
            $formatted[] = [
                'id' => $place->getId(),
                'name' => $place->getName(),
                'address' => $place->getAddress(),
            ];
        }

        return new JsonResponse($formatted);
    }

    public function getPlaceAction($id, Request $request)
    {
        $place = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Place')
            ->find($id);
        /* @var $place Place */

        if (empty($place)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        $formatted = [
            'id' => $place->getId(),
            'name' => $place->getName(),
            'address' => $place->getAddress(),
        ];

        return new JsonResponse($formatted);
    }
}
