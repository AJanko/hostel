<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Person
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="text", nullable=false)
     */
    protected $name;

    /**
     * @var string $surname
     *
     * @ORM\Column(name="surname", type="text", nullable=false)
     */
    protected $surname;

    /**
     * @var string $phone
     *
     * @ORM\Column(name="phone", type="text", nullable=false)
     */
    protected $phone;

    /**
     * @var string $document
     *
     * @ORM\Column(name="document", type="text", nullable=false)
     */
    protected $document;

    /**
     * @var Reservation[]|ArrayCollection $reservations
     *
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="person", cascade={"persist"})
     */
    protected $reservations;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param string $document
     */
    public function setDocument(string $document): void
    {
        $this->document = $document;
    }

    /** return $this */
    public function addReservation(Reservation $reservation)
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
        }

        return $this;
    }

    /* @return bool */
    public function removeReservation(Reservation $reservation)
    {
        return $this->reservation->removeReservation($reservation);
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getDocument(): ?string
    {
        return $this->document;
    }

    /**
     * @return ArrayCollection
     */
    public function getReservations(): ?ArrayCollection
    {
        return $this->reservations;
    }

    public function __toString()
    {
        return $this->name.' '.$this->surname;
    }

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }
}