<?php

namespace Louvre\TicketingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visitor
 *
 * @ORM\Table(name="visitor")
 * @ORM\Entity(repositoryClass="Louvre\TicketingBundle\Repository\VisitorRepository")
 */
class Visitor
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
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surename", type="string", length=30)
     */
    private $surename;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=30)
     */
    private $country;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date__birth", type="date")
     */
    private $dateBirth;


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
     * Set name
     *
     * @param string $name
     *
     * @return Visitor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surename
     *
     * @param string $surename
     *
     * @return Visitor
     */
    public function setSurename($surename)
    {
        $this->surename = $surename;

        return $this;
    }

    /**
     * Get surename
     *
     * @return string
     */
    public function getSurename()
    {
        return $this->surename;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Visitor
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set dateBirth
     *
     * @param \DateTime $dateBirth
     *
     * @return Visitor
     */
    public function setDateBirth($dateBirth)
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    /**
     * Get dateBirth
     *
     * @return \DateTime
     */
    public function getDateBirth()
    {
        return $this->dateBirth;
    }
}

