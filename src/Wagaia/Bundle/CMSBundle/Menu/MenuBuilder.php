<?php

namespace Wagaia\Bundle\CMSBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder
{
    private $factory;

    /**
    * @param FactoryInterface $factory
    */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $pages = $this->container->get('doctrine.orm.entity_manager')->findAll();
        /*$pages = $this->getDoctrine()
            ->getRepository('WagaiaCMSBundle:Page')
            ->findAll();*/

        foreach($pages as $page)
        {
            $menu->addChild($page->title, array(
                    'route' => 'wagaia_cms_page',
                    'routeParameters' => array('slug' => $page->slug)
                ));
        }

        /*$menu->addChild('Accueil', array('route' => 'wagaia_cms_home'));
        $menu->addChild('Page 1', array(
                'route' => 'wagaia_cms_page',
                'routeParameters' => array('slug' => 'p6')
            ));

        $menu->addChild('Page 2', array(
                'route' => 'wagaia_cms_page',
                'routeParameters' => array('slug' => 'p7')
            ));
        // ... add more children*/

        return $menu;
    }
}