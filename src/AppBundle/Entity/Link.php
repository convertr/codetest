<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table(name="link")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LinkRepository")
 */
class Link
{
    /**
     * @var int
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
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=255)
     */
    private $destination;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createTs", type="datetime")
     */
    private $createTs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Click", mappedBy="link")
     */
    private $clicks;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Link
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
     * Set destination
     *
     * @param string $destination
     *
     * @return Link
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set createTs
     *
     * @param \DateTime $createTs
     *
     * @return Link
     */
    public function setCreateTs($createTs)
    {
        $this->createTs = $createTs;

        return $this;
    }

    /**
     * Get createTs
     *
     * @return \DateTime
     */
    public function getCreateTs()
    {
        return $this->createTs;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clicks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add click
     *
     * @param \AppBundle\Entity\Click $click
     *
     * @return Link
     */
    public function addClick(\AppBundle\Entity\Click $click)
    {
        $this->clicks[] = $click;

        return $this;
    }

    /**
     * Remove click
     *
     * @param \AppBundle\Entity\Click $click
     */
    public function removeClick(\AppBundle\Entity\Click $click)
    {
        $this->clicks->removeElement($click);
    }

    /**
     * Get clicks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClicks()
    {
        return $this->clicks;
    }
}
