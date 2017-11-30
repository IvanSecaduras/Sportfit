<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Validation;

/**
 * @ORM\Entity
 * @ORM\Table(name="Categoria")
 */
class Categoria
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     * @Validation\NotBlank()
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Calidad", mappedBy="categoria")
     */
    protected $calidad;

    /**
     * @ORM\OneToMany(targetEntity="Evento", mappedBy="categoria")
     */
    protected $evento;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->calidad = new \Doctrine\Common\Collections\ArrayCollection();
        $this->evento = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Categoria
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add calidad
     *
     * @param \AppBundle\Entity\Calidad $calidad
     *
     * @return Categoria
     */
    public function addCalidad(\AppBundle\Entity\Calidad $calidad)
    {
        $this->calidad[] = $calidad;

        return $this;
    }

    /**
     * Remove calidad
     *
     * @param \AppBundle\Entity\Calidad $calidad
     */
    public function removeCalidad(\AppBundle\Entity\Calidad $calidad)
    {
        $this->calidad->removeElement($calidad);
    }

    /**
     * Get calidad
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCalidad()
    {
        return $this->calidad;
    }

    /**
     * Add evento
     *
     * @param \AppBundle\Entity\Evento $evento
     *
     * @return Categoria
     */
    public function addEvento(\AppBundle\Entity\Evento $evento)
    {
        $this->evento[] = $evento;

        return $this;
    }

    /**
     * Remove evento
     *
     * @param \AppBundle\Entity\Evento $evento
     */
    public function removeEvento(\AppBundle\Entity\Evento $evento)
    {
        $this->evento->removeElement($evento);
    }

    /**
     * Get evento
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvento()
    {
        return $this->evento;
    }
}
