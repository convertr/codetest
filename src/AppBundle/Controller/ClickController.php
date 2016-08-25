<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Click;
use AppBundle\Entity\Stats;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ClickController extends Controller
{
    /**
     * @Route("/click", name="click")
     */
    public function indexAction()
    {
        $linkId = $_GET['linkId'];
        $link = $this->get('doctrine')->getEntityManager()->find('AppBundle:Link', $linkId);
        $click = new Click();
        $click->setCreatesTs(new \DateTime());
        $click->setLink($link);
        $click->setRequest($_REQUEST);

        $this->get('doctrine')->getEntityManager()->persist($click);
        $this->get('doctrine')->getEntityManager()->flush();

        $stats = $this->get('doctrine')->getEntityManager()->getRepository('AppBundle:Stats')->findOneBy([
            'date' => new \DateTime(),
            'link' => $link
        ]);

        if ($stats) {
            $stats->setClicks($stats->getClicks()+1);
            $stats->setUpdatedTs(new \DateTime());
        } else {
            $stats = new Stats();
            $stats->setLink($link);
            $stats->setClicks(1);
            $stats->setImpressions(0);
            $stats->setDate(new \DateTime());
            $stats->setUpdatedTs(new \DateTime());
        }

        $this->get('doctrine')->getEntityManager()->persist($stats);
        $this->get('doctrine')->getEntityManager()->flush();

        header('Location: '.$link->getDestination());
        exit;
    }
}
