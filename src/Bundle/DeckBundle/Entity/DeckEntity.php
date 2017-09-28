<?php

namespace Bundle\DeckBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


use Bundle\PlayerBundle\Entity\PlayerEntity;


/**
 * DeckEntity
 *
 * @ORM\Entity
 * @ORM\Table(name="decks")
 */
class DeckEntity
{
    /**
     * @ORM\ManyToOne(targetEntity=" Bundle\PlayerBundle\Entity\PlayerEntity", inversedBy="decks")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     */
    private $player;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $suit;

    /**
     * @ORM\Column(type="integer")
     */
    private $originalDeckPosition;

    public function getId()
    {
        return $this->id;
    }



    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return PlayerEntity
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setSuit($suit)
    {
        $this->suit = $suit;

        return $this;
    }

    public function setOriginalDeckPosition($originalDeckPosition)
    {
        $this->originalDeckPosition = $originalDeckPosition;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSuit()
    {
        return $this->suit;
    }

    public function getOriginalDeckPosition()
    {
        return $this->originalDeckPosition;
    }


}