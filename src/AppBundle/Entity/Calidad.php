<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Validation;

/**
 * @ORM\Entity
 * @ORM\Table(name="Calidad")
 */
class Calidad
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
    private $calidad;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="calidad")
     */
    protected $categoria;

    /**
     * @ORM\OneToMany(targetEntity="Evento", mappedBy="calidad")
     */
    protected $evento;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set calidad
     *
     * @param string $calidad
     *
     * @return Calidad
     */
    public function setCalidad($calidad)
    {
        $this->calidad = $calidad;

        return $this;
    }

    /**
     * Get calidad
     *
     * @return string
     */
    public function getCalidad()
    {
        return $this->calidad;
    }

    /**
     * Set categoria
     *
     * @param \AppBundle\Entity\Categoria $categoria
     *
     * @return Calidad
     */
    public function setCategoria(\AppBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \AppBundle\Entity\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Add evento
     *
     * @param \AppBundle\Entity\Evento $evento
     *
     * @return Calidad
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
