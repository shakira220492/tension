<?php

namespace HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HabitacionPaciente
 *
 * @ORM\Table(name="habitacion_paciente", indexes={@ORM\Index(name="IDX_6A6FEBC3B009290D", columns={"habitacion_id"}), @ORM\Index(name="IDX_6A6FEBC37310DAD4", columns={"paciente_id"})})
 * @ORM\Entity
 */
class HabitacionPaciente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaRegistro", type="datetime", nullable=true)
     */
    private $fecharegistro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaIngreso", type="datetime", nullable=true)
     */
    private $fechaingreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaSalida", type="datetime", nullable=true)
     */
    private $fechasalida;

    /**
     * @var \Paciente
     *
     * @ORM\ManyToOne(targetEntity="Paciente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paciente_id", referencedColumnName="id")
     * })
     */
    private $paciente;

    /**
     * @var \Habitacion
     *
     * @ORM\ManyToOne(targetEntity="Habitacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="habitacion_id", referencedColumnName="id")
     * })
     */
    private $habitacion;



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
     * Set fecharegistro
     *
     * @param \DateTime $fecharegistro
     * @return HabitacionPaciente
     */
    public function setFecharegistro($fecharegistro)
    {
        $this->fecharegistro = $fecharegistro;

        return $this;
    }

    /**
     * Get fecharegistro
     *
     * @return \DateTime 
     */
    public function getFecharegistro()
    {
        return $this->fecharegistro;
    }

    /**
     * Set fechaingreso
     *
     * @param \DateTime $fechaingreso
     * @return HabitacionPaciente
     */
    public function setFechaingreso($fechaingreso)
    {
        $this->fechaingreso = $fechaingreso;

        return $this;
    }

    /**
     * Get fechaingreso
     *
     * @return \DateTime 
     */
    public function getFechaingreso()
    {
        return $this->fechaingreso;
    }

    /**
     * Set fechasalida
     *
     * @param \DateTime $fechasalida
     * @return HabitacionPaciente
     */
    public function setFechasalida($fechasalida)
    {
        $this->fechasalida = $fechasalida;

        return $this;
    }

    /**
     * Get fechasalida
     *
     * @return \DateTime 
     */
    public function getFechasalida()
    {
        return $this->fechasalida;
    }

    /**
     * Set paciente
     *
     * @param \HomeBundle\Entity\Paciente $paciente
     * @return HabitacionPaciente
     */
    public function setPaciente(\HomeBundle\Entity\Paciente $paciente = null)
    {
        $this->paciente = $paciente;

        return $this;
    }

    /**
     * Get paciente
     *
     * @return \HomeBundle\Entity\Paciente 
     */
    public function getPaciente()
    {
        return $this->paciente;
    }

    /**
     * Set habitacion
     *
     * @param \HomeBundle\Entity\Habitacion $habitacion
     * @return HabitacionPaciente
     */
    public function setHabitacion(\HomeBundle\Entity\Habitacion $habitacion = null)
    {
        $this->habitacion = $habitacion;

        return $this;
    }

    /**
     * Get habitacion
     *
     * @return \HomeBundle\Entity\Habitacion 
     */
    public function getHabitacion()
    {
        return $this->habitacion;
    }
}
