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
        $em = $this->getDoctrine()->getManager();
        $objectID = $request->request->get('objectID');

        $page = $this->getDoctrine()
            ->getRepository('WagaiaCMSBundle:Page')
            ->find($objectID);

        if($page->getIsPublish() == 0) $page->setIsPublish(1);
            else $page->setIsPublish(0);

        $em->persist($page);
        $em->flush();

        return $this->render('WagaiaCMSBundle:Admin/Custom:ajax_publish.html.twig',
            array(
                'objectID' => $objectID,
                'state' => $page->getIsPublish()
            ));
    }
}
