<?php
// src/AppBundle/Entity/Geoloc.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="geoloc")
 */
class Geoloc
{

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(name="lat", type="decimal", precision=10, scale=7)
     */
    private $lat;

    /**
     * @ORM\Column(name="lon", type="decimal", precision=10, scale=7)
     */
    private $lon;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     *  j'ai mis des OneToOne a Comptoir, Amap, Marché et Prestataire
     * à revoir ?
     *
     */


    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     * @return Geoloc
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     * @return Geoloc
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * @param mixed $lon
     * @return Geoloc
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
        return $this;
    }


}