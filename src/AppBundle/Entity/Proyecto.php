<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Proyecto
 *
 * @ORM\Table(name="proyecto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProyectoRepository")
 */
class Proyecto
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
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="entregado", type="float", nullable=true)
     */
    private $entregado;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float", nullable=true)
     */
    private $total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var bool
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;


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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Proyecto
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
     * @return Proyecto
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
     * Set entregado
     *
     * @param float $entregado
     *
     * @return Proyecto
     */
    public function setEntregado($entregado)
    {
        $this->entregado = $entregado;

        return $this;
    }

    /**
     * Get entregado
     *
     * @return float
     */
    public function getEntregado()
    {
        return $this->entregado;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Proyecto
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Proyecto
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
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Proyecto
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return bool
     */
    public function getEstado()
    {
        return $this->estado;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="proyecto")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    private $cliente;

    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="proyecto")
     */
    private $pago;

    public function __construct()
    {
        $this->pago = new ArrayCollection();
    }

    /**
     * Set cliente
     *
     * @param \AppBundle\Entity\Cliente $cliente
     *
     * @return Proyecto
     */
    public function setCliente(\AppBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \AppBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Add pago
     *
     * @param \AppBundle\Entity\Pago $pago
     *
     * @return Proyecto
     */
    public function addPago(\AppBundle\Entity\Pago $pago)
    {
        $this->pago[] = $pago;

        return $this;
    }

    /**
     * Remove pago
     *
     * @param \AppBundle\Entity\Pago $pago
     */
    public function removePago(\AppBundle\Entity\Pago $pago)
    {
        $this->pago->removeElement($pago);
    }

    /**
     * Get pago
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPago()
    {
        return $this->pago;
    }
    public function __toString(){
        return (string) $this->titulo;
    }
}
