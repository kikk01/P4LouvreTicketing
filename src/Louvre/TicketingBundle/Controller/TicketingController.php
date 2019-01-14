<?php

namespace Louvre\TicketingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Louvre\TicketingBundle\Entity\Command;
use Louvre\TicketingBundle\Form\CommandType;

class TicketingController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        $command = new Command();
        $form = $this->createForm(CommandType::class, $command);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($command);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@LouvreTicketing/Ticketing/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
