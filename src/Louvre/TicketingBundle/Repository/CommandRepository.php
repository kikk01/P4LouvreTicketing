<?php

namespace Louvre\TicketingBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Louvre\TicketingBundle\Entity\Command;

/**
 * CommandRepository
 *
 * @method Command[] findByNCommand('string' $numCommand)
 */
class CommandRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(Registry $registry)
    {
        parent::__construct($registry, Command::class);
    }
}
