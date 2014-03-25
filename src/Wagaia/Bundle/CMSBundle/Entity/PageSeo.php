<?php

namespace Wagaia\Bundle\CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageSeo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PageSeo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keyword", type="string", length=255)
     */
    private $metaKeyword;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="string", length=255)
     */
    private $metaDescription;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return PageSeo
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set $metaKeyword
     *
     * @param string $metaKeyword
     * @return PageSeo
     */
    public function setMetaKeyword($metaKeyword)
    {
        $this->$metaKeyword = $metaKeyword;

        return $this;
    }

    /**
     * Get $metaKeyword
     *
     * @return string 
     */
    public function getMetaKeyword()
    {
        return $this->metaKeyword;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return PageSeo
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }
}
