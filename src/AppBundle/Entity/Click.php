<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Click
 *
 * @ORM\Table(name="click")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClickRepository")
 */
class Click
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
     * @var \DateTime
     *
     * @ORM\Column(name="createsTs", type="datetime")
     */
    private $createsTs;

    /**
     * @var array
     *
     * @ORM\Column(name="request", type="array")
     */
    private $request;

    /**
     * @var \AppBundle\Entity\Link
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Link", inversedBy="clicks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="linkId", referencedColumnName="id")
     * })
     */
    private $link;

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
     * Set createsTs
     *
     * @param \DateTime $createsTs
     *
     * @return Click
     */
    public function setCreatesTs($createsTs)
    {
        $this->createsTs = $createsTs;

        return $this;
    }

    /**
     * Get createsTs
     *
     * @return \DateTime
     */
    public function getCreatesTs()
    {
        return $this->createsTs;
    }

    /**
     * Set request
     *
     * @param array $request
     *
     * @return Click
     */
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Get request
     *
     * @return array
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set link
     *
     * @param \AppBundle\Entity\Link $link
     *
     * @return Click
     */
    public function setLink(\AppBundle\Entity\Link $link = null)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return \AppBundle\Entity\Link
     */
    public function getLink()
    {
        return $this->link;
    }
}
