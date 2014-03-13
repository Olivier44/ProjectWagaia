<?php

namespace Wagaia\Bundle\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $homepage = $this->getDoctrine()
            ->getRepository('WagaiaCMSBundle:Page')
            ->find(5);

        if (!$homepage) {
            throw $this->createNotFoundException(
                'Aucune page trouvée.'
            );
        }

        return $this->render('WagaiaCMSBundle:Default:index.html.twig', array('page' => $homepage));
    }

    public function pageAction($slug)
    {
        $page = $this->getDoctrine()
            ->getRepository('WagaiaCMSBundle:Page')
            ->findOneBySlug($slug);

        if (!$page) {
            throw $this->createNotFoundException(
                'Page non trouvée.'
            );
        }

        return $this->render('WagaiaCMSBundle:Default:index.html.twig', array('page' => $page));
    }

    public function ajaxAction(Request $request)
    {

        return $this->render('WagaiaCMSBundle:Admin/Custom:ajax_publish_2.html.twig');
    }
}
