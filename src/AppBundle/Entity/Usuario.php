<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Usuario")
 */
class Usuario extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @var string
     */
    protected $apellidos;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     * @var int
     */
    protected $telefono;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     * @var int
     */
    protected $telefono_urgencia;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    protected $nombre_contacto;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     * @var integer
     */
    protected $codigo_postal;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipios", inversedBy="usuario")
     * @ORM\JoinColumn(name="municipio", referencedColumnName="id", nullable=true)
     */
    protected $municipio;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Camion", inversedBy="usuario")
     * @ORM\JoinColumn(name="camion", referencedColumnName="id", nullable=true)
     */
    protected $camion;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrdenTransporte", mappedBy="usuario")
     */
    protected $orden_transporte;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CartaPorte", mappedBy="usuario_crea")
     */
    protected $carta_porte_crea;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CartaPorte", mappedBy="usuario_recogida")
     */
    protected $carta_porte_recogida;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CartaPorte", mappedBy="usuario_entrega")
     */
    protected $carta_porte_entrega;

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
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getCamion()
    {
        return $this->camion;
    }

    /**
     * @param mixed $camion
     */
    public function setCamion($camion)
    {
        $this->camion = $camion;
    }

    /**
     * @return mixed
     */
    public function getOrdenTransporte()
    {
        return $this->orden_transporte;
    }

    /**
     * @param mixed $orden_transporte
     */
    public function setOrdenTransporte($orden_transporte)
    {
        $this->orden_transporte = $orden_transporte;
    }

    /**
     * @return mixed
     */
    public function getCartaPorteCrea()
    {
        return $this->carta_porte_crea;
    }

    /**
     * @param mixed $carta_porte_crea
     */
    public function setCartaPorteCrea($carta_porte_crea)
    {
        $this->carta_porte_crea = $carta_porte_crea;
    }

    /**
     * @return mixed
     */
    public function getCartaPorteRecogida()
    {
        return $this->carta_porte_recogida;
    }

    /**
     * @param mixed $carta_porte_recogida
     */
    public function setCartaPorteRecogida($carta_porte_recogida)
    {
        $this->carta_porte_recogida = $carta_porte_recogida;
    }

    /**
     * @return mixed
     */
    public function getCartaPorteEntrega()
    {
        return $this->carta_porte_entrega;
    }

    /**
     * @param mixed $carta_porte_entrega
     */
    public function setCartaPorteEntrega($carta_porte_entrega)
    {
        $this->carta_porte_entrega = $carta_porte_entrega;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return int
     */
    public function getTelefonoUrgencia()
    {
        return $this->telefono_urgencia;
    }

    /**
     * @param int $telefono_urgencia
     */
    public function setTelefonoUrgencia($telefono_urgencia)
    {
        $this->telefono_urgencia = $telefono_urgencia;
    }

    /**
     * @return string
     */
    public function getNombreContacto()
    {
        return $this->nombre_contacto;
    }

    /**
     * @param string $nombre_contacto
     */
    public function setNombreContacto($nombre_contacto)
    {
        $this->nombre_contacto = $nombre_contacto;
    }

    /**
     * @return int
     */
    public function getCodigoPostal()
    {
        return $this->codigo_postal;
    }

    /**
     * @param int $codigo_postal
     */
    public function setCodigoPostal($codigo_postal)
    {
        $this->codigo_postal = $codigo_postal;
    }

    /**
     * @return mixed
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * @param mixed $municipio
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

}
