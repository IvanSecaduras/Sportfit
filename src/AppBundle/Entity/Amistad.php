<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="Amistad")
 */
class Amistad
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @var \DateTime
     */
    protected $fecha;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @var integer
     */
    protected $tipo;

    /**
     * @ORM\OneToOne(targetEntity="Usuario", inversedBy="amistad_crea")
     */
    protected $usuario_crea;

    /**
     * @ORM\OneToOne(targetEntity="Usuario", inversedBy="amistad_recibe")
     */
    protected $usuario_recibe;

    public function __construct()
    {
        $this->setFecha(new \DateTime());
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param \DateTime $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getUsuarioCrea()
    {
        return $this->usuario_crea;
    }

    /**
     * @param mixed $usuario_crea
     */
    public function setUsuarioCrea($usuario_crea)
    {
        $this->usuario_crea = $usuario_crea;
    }

    /**
     * @return mixed
     */
    public function getUsuarioRecibe()
    {
        return $this->usuario_recibe;
    }

    /**
     * @param mixed $usuario_recibe
     */
    public function setUsuarioRecibe($usuario_recibe)
    {
        $this->usuario_recibe = $usuario_recibe;
    }

    /**
     * @return int
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param int $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

}