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

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [

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
