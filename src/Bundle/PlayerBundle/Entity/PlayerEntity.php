<?php

namespace Bundle\PlayerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Bundle\DeckBundle\Entity\DeckEntity;





/**
 * PlayerEntity
 *
 * @ORM\Entity
 * @ORM\Table(name="players")
 */
class PlayerEntity
{

    /**
     * @ORM\OneToMany(targetEntity="Bundle\PlayerBundle\Entity\PlayerEntity", mappedBy="decks")
     */
    private $decks;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    public function getId()
    {
        return $this->id;
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

    public function getName()
    {
        return $this->name;
    }


}
