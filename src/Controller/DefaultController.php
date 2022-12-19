<?php

namespace App\Controller;

use App\Entity\Link;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    #[Route('/', name: 'homepage')]
    public function indexAction(Request $request)
    {
        $links = $this->doctrine->getRepository('App\Entity\Link')->findAll();

        $stats = $this->doctrine->getRepository('App\Entity\Stats')->findAll();
        $data = [];

        foreach ($stats as $row) {
            @$data[$row->getLink()->getId()]['clicks'] += $row->getClicks();
            @$data[$row->getLink()->getId()]['impressions'] = $row->getImpressions();
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'links' => $links,
            'stats' => $data
        ]);
    }

    #[Route('/link/add', name: 'link.add')]
    public function linkAddAction(Request $request)
    {

        if ($request->isMethod('post')) {
            $link = (new Link())
                ->setName($request->request->get('name'))
                ->setDestination($request->request->get('destination'))
                ->setCreateTs(new \DateTime())
            ;

            $em = $this->doctrine->getManager();
            $em->persist($link);
            $em->flush();

            $this->addFlash('success', 'Link added successfully');

            return $this->redirectToRoute('homepage');
        }

        // replace this example code with whatever you need
        return $this->render('forms/link.html.twig', [

        ]);
    }
}
