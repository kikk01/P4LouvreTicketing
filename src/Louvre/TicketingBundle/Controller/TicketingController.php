<?php

namespace Louvre\TicketingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Louvre\TicketingBundle\Entity\Command;
use Louvre\TicketingBundle\Entity\Commande;
use Louvre\TicketingBundle\Entity\Ticket;
use Louvre\TicketingBundle\Entity\User;
use Louvre\TicketingBundle\Service\SoldService;
use Louvre\TicketingBundle\Form\CommandType;

class TicketingController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request, SoldService $soldService)
    {
        $command = new Command;
        $form   = $this->createForm(CommandType::class, $command);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($command);
            $em->flush();
        }
        
        return $this->render('@LouvreTicketing/Ticketing/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
