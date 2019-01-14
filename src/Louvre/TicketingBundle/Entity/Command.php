<?php

namespace Louvre\TicketingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @var \DateTime
     *
     * @ORM\Column(name="Date_visit", type="date")
     */
    private $dateVisit;

    /**
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="Louvre\TicketingBundle\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Louvre\TicketingBundle\Entity\Ticket", mappedBy="Command", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tickets;


    public function __construct()
    {
        $this->tickets = new ArrayCollection();
    }

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

    /**
     * Set dateVisit
     *
     * @param \DateTime $dateVisit
     *
     * @return Command
     */
    public function setDateVisit($dateVisit)
    {
        $this->dateVisit = $dateVisit;

        return $this;
    }

    /**
     * Get dateVisit
     *
     * @return \DateTime
     */
    public function getDateVisit()
    {
        return $this->dateVisit;
    }

    /**
     * Set quantity
     *
     * @param \integer $quantity
     *
     * @return Command
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function addTicket(Ticket $ticket)
    {
        $this->tickets[] = $ticket;

        $ticket->setCommand($this);

        return $this;
    }

    public function removeTicket(Ticket $ticket)
    {
        $this->tickets->removeElement($ticket);
    }

    public function getTickets()
    {
        return $this->tickets;
    }
}

