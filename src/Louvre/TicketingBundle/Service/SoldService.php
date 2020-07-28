<?php

namespace Louvre\TicketingBundle\Service;

use Louvre\TicketingBundle\Entity\Command;
use Louvre\TicketingBundle\Entity\Sold;
use Louvre\TicketingBundle\Repository\SoldRepository;
use Psr\Container\ContainerInterface;

class SoldService
{
    private $soldRepository;
    private $containerInterface;

    public function __construct(SoldRepository $soldRepository, ContainerInterface $containerInterface)
    {
        $this->soldRepository = $soldRepository;
        $this->containerInterface = $containerInterface;
    }

    public function updateCount(Command $command)
    {
        $sold = $this->soldRepository->findOneByDate($command->getDateVisit());

        if (!$sold instanceof Sold) {
            $sold = new Sold;
            $sold->setDate($command->getDateVisit());

            $doctrine = $this->containerInterface->get('doctrine');
            $em = $doctrine->getManager();
            $em->persist($sold);
        }

        $sold->setCount($sold->getCount() + $command->getQuantity());
    }
}