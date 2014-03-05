<?php

namespace Wagaia\Bundle\CMSBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PageAdmin extends Admin
{
    protected $baseRouteName = 'page';

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('title', null, array('label' => 'Titre'))
            ->add('isPublish', null, array('label' => 'Publication'))
            ->add('slug')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array('template' => 'WagaiaCMSBundle:Admin/CRUD:list_action_show.html.twig'),
                    'edit' => array('template' => 'WagaiaCMSBundle:Admin/CRUD:list_action_edit.html.twig'),
                    'delete' => array('template' => 'WagaiaCMSBundle:Admin/CRUD:list_action_delete.html.twig')
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('content', null, array('required' => false, 'attr' => array('class' => 'wysiwyg-toolbar btn-toolbar center  wysiwyg-style2')))
            ->add('isPublish', 'checkbox')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title')
            ->add('content')
        ;
    }
}
