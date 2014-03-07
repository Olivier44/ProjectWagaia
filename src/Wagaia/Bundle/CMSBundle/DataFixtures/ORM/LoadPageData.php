<?php

namespace Wagaia\Bundle\CMSBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wagaia\Bundle\CMSBundle\Entity\Page;

class LoadPageData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $page = new Page();
        $page->setTitle('Page d\'accueil');

        $content = '<h1>Mon titre niveau 1</h1>';
        $content .= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id malesuada lectus.';
        $content .= 'Sed consectetur eros turpis, id bibendum nibh volutpat vitae. In hac habitasse platea dictumst.</p>';
        $content .= '<h2>Mon titre niveau 2</h2>';
        $content .= '<p>Une liste</p>';
        $content .= '<ul>';
        $content .= '<li>Sed consectetur eros turpis, id bibendum nibh volutpat vitae.</li>';
        $content .= '<li>Proin porttitor massa a pretium posuere.</li>';
        $content .= '<li>Proin porttitor massa a pretium posuere. Curabitur turpis elit, gravida eget dolor quis, tempu.';
        $content .= 'Proin porttitor massa a pretium posuere.  Cras feugiat urna quis mauris euismod.</li>';
        $content .= '</ul>';
        $content .= '<h3>Mon titre niveau 2</h3>';
        $content .= '<p>Texte avec un mot en <strong>gras</strong> et un <a href="#">lien</a></p>';

        $page->setContent($content);
        $page->setOrdre(1);
        $page->setIsPublish(1);
        $page->setIsEditable(1);

        $manager->persist($page);

        $page = new Page();
        $page->setTitle('Une autre page');
        $page->setContent($content);
        $page->setOrdre(1);
        $page->setIsPublish(1);
        $page->setIsEditable(1);

        $manager->persist($page);

        $page = new Page();
        $page->setTitle('3 ème page');
        $page->setContent($content);
        $page->setOrdre(1);
        $page->setIsPublish(1);
        $page->setIsEditable(1);

        $manager->persist($page);

        $page = new Page();
        $page->setTitle('contact');
        $page->setContent($content);
        $page->setOrdre(1);
        $page->setIsPublish(1);
        $page->setIsEditable(1);

        $manager->persist($page);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // l'ordre dans lequel les fichiers sont chargés
    }
}