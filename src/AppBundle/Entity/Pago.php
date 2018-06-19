<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pago
 *
 * @ORM\Table(name="pago")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PagoRepository")
 */
class Pago
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
     * @var float
     *
     * @ORM\Column(name="ingreso", type="float", nullable=true)
     */
    private $ingreso;
    /**
     * @var float
     *
     * @ORM\Column(name="egreso", type="float", nullable=true)
     */
    private $egreso;
    /**
     * @var float
     *
     * @ORM\Column(name="extraccion", type="float", nullable=true)
     */
    private $extraccion;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Pago
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Proyecto", inversedBy="pago")
     * @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id")
     */
    private $proyecto;
    /**
     * @ORM\ManyToOne(targetEntity="tipoPago", inversedBy="pago")
     * @ORM\JoinColumn(name="tipoPago_id", referencedColumnName="id")
     */
    private $tipoPago;
    /**
     * Set proyecto
     *
     * @param \AppBundle\Entity\Proyecto $proyecto
     *
     * @return Pago
     */
    public function setProyecto(\AppBundle\Entity\Proyecto $proyecto = null)
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \AppBundle\Entity\Proyecto
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }

    /**
     * Set ingreso
     *
     * @param float $ingreso
     *
     * @return Pago
     */
    public function setIngreso($ingreso)
    {
        $this->ingreso = $ingreso;

        return $this;
    }

    /**
     * Get ingreso
     *
     * @return float
     */
    public function getIngreso()
    {
        return $this->ingreso;
    }

    /**
     * Set egreso
     *
     * @param float $egreso
     *
     * @return Pago
     */
    public function setEgreso($egreso)
    {
        $this->egreso = $egreso;

        return $this;
    }

    /**
     * Get egreso
     *
     * @return float
     */
    public function getEgreso()
    {
        return $this->egreso;
    }

    /**
     * Set extraccion
     *
     * @param float $extraccion
     *
     * @return Pago
     */
    public function setExtraccion($extraccion)
    {
        $this->extraccion = $extraccion;

        return $this;
    }

    /**
     * Get extraccion
     *
     * @return float
     */
    public function getExtraccion()
    {
        return $this->extraccion;
    }

    /**
     * Set tipoPago
     *
     * @param \AppBundle\Entity\tipoPago $tipoPago
     *
     * @return Pago
     */
    public function setTipoPago(\AppBundle\Entity\tipoPago $tipoPago = null)
    {
        $this->tipoPago = $tipoPago;

        return $this;
    }

    /**
     * Get tipoPago
     *
     * @return \AppBundle\Entity\tipoPago
     */
    public function getTipoPago()
    {
        return $this->tipoPago;
    }
}
