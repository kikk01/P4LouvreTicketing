<?php

namespace Louvre\TicketingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Louvre\TicketingBundle\Entity\Order;
use Louvre\TicketingBundle\Form\OrderType;

class TicketingController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@LouvreTicketing/Ticketing/index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
