<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Link;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $links = $this->getDoctrine()->getRepository('AppBundle:Link')->findAll();

        $stats = $this->getDoctrine()->getRepository('AppBundle:Stats')->findAll();
        $data = [];

        foreach ($stats as $row) {
            if (!isset($data[$row->getLink()->getId()])) {
                $data[$row->getLink()->getId()]['clicks'] = 0;
                $data[$row->getLink()->getId()]['impressions'] = 0;
            }

            $data[$row->getLink()->getId()]['clicks'] += $row->getClicks();
            $data[$row->getLink()->getId()]['impressions'] = $row->getImpressions();
        }


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'links' => $links,
            'stats' => $data
        ]);
    }

    /**
     * @Route("/link/add", name="link.add")
     */
    public function linkAddAction(Request $request)
    {

        if ($request->isMethod('post')) {
            $link = (new Link())
                ->setName($request->request->get('name'))
                ->setDestination($request->request->get('destination'))
                ->setCreateTs(new \DateTime())
            ;

            $em = $this->getDoctrine()->getManager();
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
