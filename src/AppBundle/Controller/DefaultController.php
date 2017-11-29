<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        $authChecker = $this->get('security.authorization_checker');
        $router = $this->get('router');

        if($authChecker->isGranted('ROLE_SUPER_ADMIN')){
            return new RedirectResponse($router->generate('panel-control'), 307);
        }elseif ($authChecker->isGranted('ROLE_ADMIN')) {
            return new RedirectResponse($router->generate('panel-control'), 307);
        }elseif($authChecker->isGranted('ROLE_LOGISTICA')){
            return new RedirectResponse($router->generate('panel-control'), 307);
        }elseif($authChecker->isGranted('ROLE_CHOFER')){
            return new RedirectResponse($router->generate('panel-control'), 307);
        }

        return $this->redirectToRoute('fos_user_security_login');
    }

    public function panelAction(Request $request)
    {
        return $this->render(':default:index.html.twig');
    }
}
