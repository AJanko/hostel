<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var Person $person
     *
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="reservations")
     */
    protected $person;

    /**
     * @var Room $room
     *
     * @ORM\OneToOne(targetEntity="Room", mappedBy="Room")
     */
    protected $room;

    /**
     * @var DateTime $date
     *
     * @ORM\Column(name="date", type="datetime")
     */
    protected $date;

    /**
     * @var DateTime $checkIn
     *
     * @ORM\Column(name="check_in", type="datetime")
     */
    protected $checkIn;

    /**
     * @var DateTime $checkOut
     *
     * @ORM\Column(name="check_out", type="datetime")
     */
    protected $checkOut;

    /**
     * @var integer $cost
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $cost;

    /**
     * @param ArrayCollection $person
     */
    public function setPerson(ArrayCollection $person): void
    {
        $this->person = $person;
    }

    /**
     * @param ArrayCollection $room
     */
    public function setRoom(ArrayCollection $room): void
    {
        $this->room = $room;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @param DateTime $checkIn
     */
    public function setCheckIn(DateTime $checkIn): void
    {
        $this->checkIn = $checkIn;
    }

    /**
     * @param DateTime $checkOut
     */
    public function setCheckOut(DateTime $checkOut): void
    {
        $this->checkOut = $checkOut;
    }

    /**
     * @param int $cost
     */
    public function setCost(int $cost): void
    {
        $this->cost = $cost;
    }

    /**
     * @return Person
     */
    public function getPerson(): ?Person
    {
        return $this->person;
    }

    /**
     * @return Room
     */
    public function getRoom(): ?Room
    {
        return $this->room;
    }

    /**
     * @return DateTime
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @return DateTime
     */
    public function getCheckIn(): ?DateTime
    {
        return $this->checkIn;
    }

    /**
     * @return DateTime
     */
    public function getCheckOut(): ?DateTime
    {
        return $this->checkOut;
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->cost;
    }

    public function __toString()
    {
        return $this->person.' '.$this->getRoom();
    }
}