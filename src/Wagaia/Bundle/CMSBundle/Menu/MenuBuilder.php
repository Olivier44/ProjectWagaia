<?php

namespace Wagaia\Bundle\CMSBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Entitymanager;

class MenuBuilder
{
    private $factory;
    private $em;

    public function __construct(FactoryInterface $factory, Entitymanager $em)
    {
        $this->factory = $factory;
        $this->em = $em;
    }

    /**
     * Création du menu pricipal pour le front office
     *
     * @param Request $request
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');

        $pages = $this->em->getRepository('WagaiaCMSBundle:Page')->findAll();

        foreach($pages as $page)
        {
            $menu->addChild($page->getTitle(), array(
                    'label' => $page->getTitle(),
                    'route' => 'wagaia_cms_page',
                    'routeParameters' => array('slug' => $page->getSlug())
                ));
        }

        return $menu;
    }

    public function createAdminMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Liste des pages', array('route' => 'page_list'));

    }
}