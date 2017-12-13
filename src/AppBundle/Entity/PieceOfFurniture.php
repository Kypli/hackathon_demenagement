<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PieceOfFurniture
 *
 * @ORM\Table(name="piece_of_furniture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PieceOfFurnitureRepository")
 */
class PieceOfFurniture
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="room", inversedBy="PiecesOfFurniture")
     */
    private $room;

    /**
     * @ORM\ManyToOne(targetEntity="typeFurniture", inversedBy="PiecesOfFurniture")
     */
    private $typeFurniture;
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
     * @return PieceOfFurniture
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
     * Set room
     *
     * @param \AppBundle\Entity\room $room
     *
     * @return PieceOfFurniture
     */
    public function setRoom(\AppBundle\Entity\room $room = null)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return \AppBundle\Entity\room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set typeFurniture
     *
     * @param \AppBundle\Entity\typeFurniture $typeFurniture
     *
     * @return PieceOfFurniture
     */
    public function setTypeFurniture(\AppBundle\Entity\typeFurniture $typeFurniture = null)
    {
        $this->typeFurniture = $typeFurniture;

        return $this;
    }

    /**
     * Get typeFurniture
     *
     * @return \AppBundle\Entity\typeFurniture
     */
    public function getTypeFurniture()
    {
        return $this->typeFurniture;
    }
}