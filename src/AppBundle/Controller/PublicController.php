<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PublicController extends Controller
{

    public function trackingAction(Request $request)
    {
        return $this->render('@App/public/tracking.html.twig');
    }

    public function selectPoblacionesAction(Request $request)
    {
        $provincia_id = $request->request->get('provincia_id');

        $em = $this->getDoctrine()->getManager();

        $provincia = $em->getRepository('AppBundle:Provincias')
            ->findOneBy([ 'id' => $provincia_id]);

        $poblaciones = $em->createQueryBuilder()
            ->select('p')
            ->from('AppBundle:Municipios', 'p')
            ->where('p.provincia = :provincia')
            ->setParameter(':provincia', $provincia)
            ->orderBy('p.municipio')
            ->getQuery()
            ->getArrayResult();

        return new JsonResponse($poblaciones);
    }
}
