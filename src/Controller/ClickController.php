<?php

namespace App\Controller;

use App\Entity\Click;
use App\Entity\Stats;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClickController extends AbstractController
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    #[Route('/click', name: 'click')]
    public function indexAction()
    {
        $linkId = $_GET['linkId'];
        $link = $this->doctrine->getManager()->find('App\Entity\Link', $linkId);
        $click = new Click();
        $click->setCreatesTs(new \DateTime());
        $click->setLink($link);
        $click->setRequest($_REQUEST);
        $click->setIp($_SERVER['REMOTE_ADDR']);

        $this->doctrine->getManager()->persist($click);
        $this->doctrine->getManager()->flush();

        $stats = $this->doctrine->getManager()->getRepository('App\Entity\Stats')->findOneBy([
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

        $this->doctrine->getManager()->persist($stats);
        $this->doctrine->getManager()->flush();

        header('Location: '.$link->getDestination());
        exit;
    }
}
