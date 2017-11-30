<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Validation;

/**
 * @ORM\Entity
 * @ORM\Table(name="Aviso")
 */
class Aviso
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
    private $contenido;

    /**
     * @ORM\Column(type="boolean")
     * @var boolean
     * @Validation\NotBlank()
     */
    private $leido;

    /**
     * @ORM\ManyToOne(targetEntity="Evento", inversedBy="aviso")
     */
    protected $evento;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="aviso_crea")
     */
    protected $usuario_crea;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="aviso_recibe")
     * @ORM\JoinColumn(name="usuario_recibe", referencedColumnName="id", nullable=true)
     */
    protected $usuario_recibe;


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
     * Set tipo
     *
     * @param integer $tipo
     *
     * @return Aviso
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set equipo
     *
     * @param string $equipo
     *
     * @return Aviso
     */
    public function setEquipo($equipo)
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get equipo
     *
     * @return string
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set leido
     *
     * @param boolean $leido
     *
     * @return Aviso
     */
    public function setLeido($leido)
    {
        $this->leido = $leido;

        return $this;
    }

    /**
     * Get leido
     *
     * @return boolean
     */
    public function getLeido()
    {
        return $this->leido;
    }

    /**
     * Set evento
     *
     * @param \AppBundle\Entity\Evento $evento
     *
     * @return Aviso
     */
    public function setEvento(\AppBundle\Entity\Evento $evento = null)
    {
        $this->evento = $evento;

        return $this;
    }

    /**
     * Get evento
     *
     * @return \AppBundle\Entity\Evento
     */
    public function getEvento()
    {
        return $this->evento;
    }

    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\Usuario $usuario
     *
     * @return Aviso
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
}
