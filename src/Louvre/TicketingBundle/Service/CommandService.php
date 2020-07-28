<?php

namespace Louvre\TicketingBundle\Service;

use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Louvre\TicketingBundle\Entity\Command;
use Louvre\TicketingBundle\Repository\CommandRepository;

class CommandService extends CommandRepository
{

    public function setNumCOmmand(Command $command)
    {
        $numCommand = $this->createNumCommand();

        $command->setNCommand($numCommand);
    }

    private function createNumCommand()
    {
        $numCommand = (new DateTime())->format('Ymdhis') . bin2hex(random_bytes(10));
        $commands = $this->findByNCommand($numCommand);

        if (!empty($commands)) {
            $numCommand = $this->createNumCommand();
        }

        return $numCommand;
    }
}