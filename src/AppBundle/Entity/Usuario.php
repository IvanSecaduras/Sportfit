<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    protected $apellidos;

    /**
     * @ORM\Column(type="string", length=140, nullable=true)
     * @var string
     */
    protected $biografia;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     * @var string
     */
    protected $facebook;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     * @var string
     */
    protected $twitter;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     * @var string
     */
    protected $instagram;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * * @var \DateTime
     */
    protected $fecha_nacimiento;

    /**
     *
     * @Vich\UploadableField(mapping="usuario_image", fileNameProperty="imageName")
     * @var File
     */
    protected $imageFile;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @var string
     */
    protected $imageName;

    /**
     * @Vich\UploadableField(mapping="background_image", fileNameProperty="backgroundImg")
     * @var File
     */
    protected $background_name;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @var string
     */
    protected $backgroundImg;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipios", inversedBy="usuario")
     * @ORM\JoinColumn(name="municipio", referencedColumnName="id", nullable=true)
     */
    protected $municipio;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Aviso", mappedBy="usuario_crea", cascade={"persist", "remove"})
     */
    protected $aviso_crea;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Aviso", mappedBy="usuario_recibe")
     */
    protected $aviso_recibe;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Evento", mappedBy="usuario", cascade={"persist", "remove"})
     */
    protected $evento;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Amistad", mappedBy="usuario_crea")
     */
    protected $amistad_crea;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Amistad", mappedBy="usuario_recibe")
     */
    protected $amistad_recibe;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->roles = array('ROLE_USER');
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
     * @return string
     */
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * @param string $biografia
     */
    public function setBiografia($biografia)
    {
        $this->biografia = $biografia;
    }

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @return string
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * @param string $instagram
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * @param \DateTime $fecha_nacimiento
     */
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return File
     */
    public function getBackgroundName()
    {
        return $this->background_name;
    }

    /**
     * @param File $background_name
     */
    public function setBackgroundName($background_name)
    {
        $this->background_name = $background_name;
    }

    /**
     * @return string
     */
    public function getBackgroundImg()
    {
        return $this->backgroundImg;
    }

    /**
     * @param string $backgroundImg
     */
    public function setBackgroundImg($backgroundImg)
    {
        $this->backgroundImg = $backgroundImg;
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

    /**
     * @return mixed
     */
    public function getEvento()
    {
        return $this->evento;
    }

    /**
     * @param mixed $evento
     */
    public function setEvento($evento)
    {
        $this->evento = $evento;
    }

    /**
     * @return mixed
     */
    public function getAvisoCrea()
    {
        return $this->aviso_crea;
    }

    /**
     * @param mixed $aviso_crea
     */
    public function setAvisoCrea($aviso_crea)
    {
        $this->aviso_crea = $aviso_crea;
    }

    /**
     * @return mixed
     */
    public function getAvisoRecibe()
    {
        return $this->aviso_recibe;
    }

    /**
     * @param mixed $aviso_recibe
     */
    public function setAvisoRecibe($aviso_recibe)
    {
        $this->aviso_recibe = $aviso_recibe;
    }

    /**
     * @return mixed
     */
    public function getSolicitudCrea()
    {
        return $this->solicitud_crea;
    }

    /**
     * @param mixed $solicitud_crea
     */
    public function setSolicitudCrea($solicitud_crea)
    {
        $this->solicitud_crea = $solicitud_crea;
    }

    /**
     * @return mixed
     */
    public function getAmistadCrea()
    {
        return $this->amistad_crea;
    }

    /**
     * @param mixed $amistad_crea
     */
    public function setAmistadCrea($amistad_crea)
    {
        $this->amistad_crea = $amistad_crea;
    }

    /**
     * @return mixed
     */
    public function getAmistadRecibe()
    {
        return $this->amistad_recibe;
    }

    /**
     * @param mixed $amistad_recibe
     */
    public function setAmistadRecibe($amistad_recibe)
    {
        $this->amistad_recibe = $amistad_recibe;
    }

}