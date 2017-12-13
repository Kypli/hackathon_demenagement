<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoomRepository")
 */
class Room
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
     * @ORM\OneToMany(targetEntity="PieceOfFurniture", mappedBy="room")
     */
    private $PiecesOfFurniture;

    /**
     * @ORM\OneToMany(targetEntity="typeFurniture", mappedBy="room")
     */
    private $typesFurniture;


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
     * @return Room
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
     * Constructor
     */
    public function __construct()
    {
        $this->PiecesOfFurniture = new \Doctrine\Common\Collections\ArrayCollection();
        $this->typesFurniture = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add piecesOfFurniture
     *
     * @param \AppBundle\Entity\PieceOfFurniture $piecesOfFurniture
     *
     * @return Room
     */
    public function addPiecesOfFurniture(\AppBundle\Entity\PieceOfFurniture $piecesOfFurniture)
    {
        $this->PiecesOfFurniture[] = $piecesOfFurniture;

        return $this;
    }

    /**
     * Remove piecesOfFurniture
     *
     * @param \AppBundle\Entity\PieceOfFurniture $piecesOfFurniture
     */
    public function removePiecesOfFurniture(\AppBundle\Entity\PieceOfFurniture $piecesOfFurniture)
    {
        $this->PiecesOfFurniture->removeElement($piecesOfFurniture);
    }

    /**
     * Get piecesOfFurniture
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPiecesOfFurniture()
    {
        return $this->PiecesOfFurniture;
    }

    /**
     * Add typesFurniture
     *
     * @param \AppBundle\Entity\typeFurniture $typesFurniture
     *
     * @return Room
     */
    public function addTypesFurniture(\AppBundle\Entity\typeFurniture $typesFurniture)
    {
        $this->typesFurniture[] = $typesFurniture;

        return $this;
    }

    /**
     * Remove typesFurniture
     *
     * @param \AppBundle\Entity\typeFurniture $typesFurniture
     */
    public function removeTypesFurniture(\AppBundle\Entity\typeFurniture $typesFurniture)
    {
        $this->typesFurniture->removeElement($typesFurniture);
    }

    /**
     * Get typesFurniture
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypesFurniture()
    {
        return $this->typesFurniture;
    }
}
