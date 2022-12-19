<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Click
 *
 * @ORM\Table(name="click")
 * @ORM\Entity(repositoryClass="App\Repository\ClickRepository")
 */
class Click
{
    /**
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(name="createsTs", type="datetime")
     */
    private \DateTimeInterface $createsTs;

    /**
     * @ORM\Column(name="request", type="json")
     */
    private array $request;

    /**
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private string $ip;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Link", inversedBy="clicks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="linkId", referencedColumnName="id")
     * })
     */
    private Link $link;

    public function getId()
    {
        return $this->id;
    }

    public function setCreatesTs($createsTs)
    {
        $this->createsTs = $createsTs;

        return $this;
    }

    public function getCreatesTs()
    {
        return $this->createsTs;
    }

    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setLink(\App\Entity\Link $link = null)
    {
        $this->link = $link;

        return $this;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    public function getIp()
    {
        return $this->ip;
    }
}
