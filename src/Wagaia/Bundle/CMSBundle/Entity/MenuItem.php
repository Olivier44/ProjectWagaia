<?php

namespace Wagaia\Bundle\CMSBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MenuItem
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Wagaia\Bundle\CMSBundle\Entity\MenuItemRepository")
 */
class MenuItem
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre", type="smallint", nullable=true, options={"default":0})
     */
    private $ordre;

    /**
     * @ORM\ManyToMany(targetEntity="Menu", inversedBy="menus")
     **/
    private $items;

    /*public function __construct() {
        $this->$items = new \Doctrine\Common\Collections\ArrayCollection();
    }*/


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
     * Set name
     *
     * @param string $name
     * @return MenuItem
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     * @return MenuItem
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    public function __toString()
    {
        return $this->name;
    }
}
