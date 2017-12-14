<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * typeFurniture
 *
 * @ORM\Table(name="type_furniture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeFurnitureRepository")
 */
class TypeFurniture
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
     * @ORM\OneToMany(targetEntity="PieceOfFurniture", mappedBy="typeFurniture")
     */
    private $PiecesOfFurniture;

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
     * @return typeFurniture
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
    }

    /**
     * Add piecesOfFurniture
     *
     * @param \AppBundle\Entity\PieceOfFurniture $piecesOfFurniture
     *
     * @return typeFurniture
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
}
