<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * tipoPago
 *
 * @ORM\Table(name="tipo_pago")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\tipoPagoRepository")
 */
class tipoPago
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
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;


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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return tipoPago
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }
    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="tipoPago")
     */
    private $pago;

    public function __construct()
    {
        $this->pago = new ArrayCollection();
    }

    /**
     * Add pago
     *
     * @param \AppBundle\Entity\Pago $pago
     *
     * @return tipoPago
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
}
