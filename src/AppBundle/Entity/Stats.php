<?php

namespace AppBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\ORM\Mapping as ORM;

/**
 * Stats
 *
 * @ORM\Table(name="stats")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StatsRepository")
 */
class Stats
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
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="impressions", type="integer")
     */
    private $impressions;

    /**
     * @var int
     *
     * @ORM\Column(name="clicks", type="integer")
     */
    private $clicks;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="udpatedTs", type="datetime")
     */
    private $udpatedTs;

    /**
     * @var \AppBundle\Entity\Link
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Link")
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Stats
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set impressions
     *
     * @param integer $impressions
     *
     * @return Stats
     */
    public function setImpressions($impressions)
    {
        $this->impressions = $impressions;

        return $this;
    }

    /**
     * Get impressions
     *
     * @return int
     */
    public function getImpressions()
    {
        return $this->impressions;
    }

    /**
     * Set clicks
     *
     * @param integer $clicks
     *
     * @return Stats
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;

        return $this;
    }

    /**
     * Get clicks
     *
     * @return int
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * Set udpatedTs
     *
     * @param \DateTime $udpatedTs
     *
     * @return Stats
     */
    public function setUdpatedTs($udpatedTs)
    {
        $this->udpatedTs = $udpatedTs;

        return $this;
    }

    /**
     * Get udpatedTs
     *
     * @return \DateTime
     */
    public function getUdpatedTs()
    {
        return $this->udpatedTs;
    }

    /**
     * Set link
     *
     * @param \AppBundle\Entity\Link $link
     *
     * @return Stats
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
