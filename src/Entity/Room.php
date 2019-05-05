<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Room
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * var integer $number
     *
     * @ORM\Column(type="integer")
     */
    protected $number;

    /**
     * var integer $quantity
     *
     * @ORM\Column(type="integer")
     */
    protected $quantity;

    /**
     * var integer $price
     *
     * @ORM\Column(type="integer")
     */
    protected $price;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="room")
     */
    protected $reservation;

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function __toString()
    {
        return $this->getNumber().'- '.$this->getQuantity().' people';
    }
}