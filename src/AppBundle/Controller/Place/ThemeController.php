<?php

namespace AppBundle\Controller\Place;

use AppBundle\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ThemeController extends Controller
{
    /**
     * @Rest\View(serializeGroups={"theme"})
     * @Rest\Get("/places/{id}/themes")
     */
    public function getThemesAction(Request $request)
    {
        $place = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Place')
            ->find($request->get('id'));
        /* @var $place Place */

        if (empty($place)) {
            return $this->placeNotFound();
        }

        return $this->getThemes();
    }
}
