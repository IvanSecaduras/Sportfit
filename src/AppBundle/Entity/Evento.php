<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Validation;

/**
 * @ORM\Entity
 * @ORM\Table(name="Evento")
 */
class Evento
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     * @Validation\NotBlank()
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=30)
     * @var string
     * @Validation\NotBlank()
     */
    private $tipo;

    /**
     * @ORM\Column(type="text",nullable=true)
     * @var string
     */
    private $descripcion;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     * @Validation\NotBlank()
     */
    private $fecha_evento;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     * @Validation\NotBlank()
     */
    private $fecha_creacion;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     * @Validation\NotBlank()
     */
    private $fecha_fin;

    /**
     * @ORM\Column(type="float")
     * @var float
     * @Validation\NotBlank()
     */
    private $precio;

    /**
     * @ORM\Column(type="string")
     * @var string
     * @Validation\NotBlank()
     */
    private $equipo_A;

    /**
     * @ORM\Column(type="string",nullable=true)
     * @var string
     */
    private $equipo_B;

    /**
     * @ORM\Column(type="string")
     * @var string
     * @Validation\NotBlank()
     */
    private $personas_A;

    /**
     * @ORM\Column(type="string",nullable=true)
     * @var string
     */
    private $personas_B;

    /**
     * @ORM\Column(type="string",nullable=true)
     * @var string
     */
    private $color_A;

    /**
     * @ORM\Column(type="string",nullable=true)
     * @var string
     */
    private $color_B;

    /**
     * @ORM\Column(type="string",nullable=true)
     * @var string
     */
    private $resultado_A;

    /**
     * @ORM\Column(type="string",nullable=true)
     * @var string
     */
    private $resultado_B;

    /**
     * @ORM\ManyToOne(targetEntity="Calidad", inversedBy="evento")
     */
    protected $calidad;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="evento")
     */
    protected $categoria;

    /**
     * @ORM\ManyToOne(targetEntity="Municipios", inversedBy="evento")
     */
    protected $municipio;

    /**
     * @ORM\OneToMany(targetEntity="Aviso", mappedBy="evento", cascade={"persist", "remove"})
     */
    protected $aviso;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="evento")
     */
    protected $usuario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->aviso = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Evento
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Evento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechaEvento
     *
     * @param \DateTime $fechaEvento
     *
     * @return Evento
     */
    public function setFechaEvento($fechaEvento)
    {
        $this->fecha_evento = $fechaEvento;

        return $this;
    }

    /**
     * Get fechaEvento
     *
     * @return \DateTime
     */
    public function getFechaEvento()
    {
        return $this->fecha_evento;
    }

    /**
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param \DateTime $fecha_fin
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }



    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Evento
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fecha_creacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Evento
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set equipoA
     *
     * @param string $equipoA
     *
     * @return Evento
     */
    public function setEquipoA($equipoA)
    {
        $this->equipo_A = $equipoA;

        return $this;
    }

    /**
     * Get equipoA
     *
     * @return string
     */
    public function getEquipoA()
    {
        return $this->equipo_A;
    }

    /**
     * Set equipoB
     *
     * @param string $equipoB
     *
     * @return Evento
     */
    public function setEquipoB($equipoB)
    {
        $this->equipo_B = $equipoB;

        return $this;
    }

    /**
     * Get equipoB
     *
     * @return string
     */
    public function getEquipoB()
    {
        return $this->equipo_B;
    }

    /**
     * Set colorA
     *
     * @param string $colorA
     *
     * @return Evento
     */
    public function setColorA($colorA)
    {
        $this->color_A = $colorA;

        return $this;
    }

    /**
     * Get colorA
     *
     * @return string
     */
    public function getColorA()
    {
        return $this->color_A;
    }

    /**
     * Set colorB
     *
     * @param string $colorB
     *
     * @return Evento
     */
    public function setColorB($colorB)
    {
        $this->color_B = $colorB;

        return $this;
    }

    /**
     * Get colorB
     *
     * @return string
     */
    public function getColorB()
    {
        return $this->color_B;
    }

    /**
     * Set resultadoA
     *
     * @param string $resultadoA
     *
     * @return Evento
     */
    public function setResultadoA($resultadoA)
    {
        $this->resultado_A = $resultadoA;

        return $this;
    }

    /**
     * Get resultadoA
     *
     * @return string
     */
    public function getResultadoA()
    {
        return $this->resultado_A;
    }

    /**
     * Set resultadoB
     *
     * @param string $resultadoB
     *
     * @return Evento
     */
    public function setResultadoB($resultadoB)
    {
        $this->resultado_B = $resultadoB;

        return $this;
    }

    /**
     * Get resultadoB
     *
     * @return string
     */
    public function getResultadoB()
    {
        return $this->resultado_B;
    }

    /**
     * Set calidad
     *
     * @param \AppBundle\Entity\Calidad $calidad
     *
     * @return Evento
     */
    public function setCalidad(\AppBundle\Entity\Calidad $calidad = null)
    {
        $this->calidad = $calidad;

        return $this;
    }

    /**
     * Get calidad
     *
     * @return \AppBundle\Entity\Calidad
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
     * @return Evento
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
     * Set municipio
     *
     * @param \AppBundle\Entity\Municipios $municipio
     *
     * @return Evento
     */
    public function setMunicipio(\AppBundle\Entity\Municipios $municipio = null)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return \AppBundle\Entity\Municipios
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Add aviso
     *
     * @param \AppBundle\Entity\Aviso $aviso
     *
     * @return Evento
     */
    public function addAviso(\AppBundle\Entity\Aviso $aviso)
    {
        $this->aviso[] = $aviso;

        return $this;
    }

    /**
     * Remove aviso
     *
     * @param \AppBundle\Entity\Aviso $aviso
     */
    public function removeAviso(\AppBundle\Entity\Aviso $aviso)
    {
        $this->aviso->removeElement($aviso);
    }

    /**
     * Get aviso
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAviso()
    {
        return $this->aviso;
    }

    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\Usuario $usuario
     *
     * @return Evento
     */
    public function setUsuario(\AppBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return string
     */
    public function getPersonasA()
    {
        return $this->personas_A;
    }

    /**
     * @param string $personas_A
     */
    public function setPersonasA($personas_A)
    {
        $this->personas_A = $personas_A;
    }

    /**
     * @return string
     */
    public function getPersonasB()
    {
        return $this->personas_B;
    }

    /**
     * @param string $personas_B
     */
    public function setPersonasB($personas_B)
    {
        $this->personas_B = $personas_B;
    }

}
