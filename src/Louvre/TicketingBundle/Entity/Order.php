<?php

namespace Louvre\TicketingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Order
 *
 * @ORM\Table(name="order")
 * @ORM\Entity(repositoryClass="Louvre\TicketingBundle\Repository\OrderRepository")
 */
class Order
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
     * @ORM\Column(name="n_order", type="string", length=10, unique=true)
     */
    private $nOrder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_visit", type="date")
     */
    private $dateVisit;

    /**
     * @ORM\Column(name="quantity", type="integer")
     * @Assert\Range(
     *      min = 1)
     */
    private $quantity = 1;

    /**
     * @ORM\ManyToOne(targetEntity="Louvre\TicketingBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Louvre\TicketingBundle\Entity\Ticket", mappedBy="order", cascade={"persist", "remove"})
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
     * Set nOrder
     *
     * @param string $nOrder
     *
     * @return Order
     */
    public function setNOrder($nOrder)
    {
        $this->nOrder = $nOrder;

        return $this;
    }

    /**
     * Get nOrder
     *
     * @return string
     */
    public function getNOrder()
    {
        return $this->nOrder;
    }

    /**
     * Set dateVisit
     *
     * @param \DateTime $dateVisit
     *
     * @return Order
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
     * @return Order
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

        $ticket->setOrder($this);

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

