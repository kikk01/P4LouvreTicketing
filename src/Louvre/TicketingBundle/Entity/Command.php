<?php

namespace Louvre\TicketingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Command
 *
 * @ORM\Table(name="command")
 * @ORM\Entity(repositoryClass="Louvre\TicketingBundle\Repository\CommandRepository")
 */
class Command
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="n_command", type="string", length=10, unique=true)
     */
    private $nCommand;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nCommand
     *
     * @param string $nCommand
     *
     * @return Command
     */
    public function setNCommand($nCommand)
    {
        $this->nCommand = $nCommand;

        return $this;
    }

    /**
     * Get nCommand
     *
     * @return string
     */
    public function getNCommand()
    {
        return $this->nCommand;
    }
}

