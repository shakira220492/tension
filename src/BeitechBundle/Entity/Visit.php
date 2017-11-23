<?php

namespace BeitechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visit
 *
 * @ORM\Table(name="visit")
 * @ORM\Entity
 */
class Visit
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
     * @var string
     *
     * @ORM\Column(name="hour", type="string", length=20, nullable=false)
     */
    private $hour;

    /**
     * @var string
     *
     * @ORM\Column(name="geolocalization", type="string", length=50, nullable=false)
     */
    private $geolocalization;



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
     * Set hour
     *
     * @param string $hour
     * @return Visit
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Get hour
     *
     * @return string 
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set geolocalization
     *
     * @param string $geolocalization
     * @return Visit
     */
    public function setGeolocalization($geolocalization)
    {
        $this->geolocalization = $geolocalization;

        return $this;
    }

    /**
     * Get geolocalization
     *
     * @return string 
     */
    public function getGeolocalization()
    {
        return $this->geolocalization;
    }
}
