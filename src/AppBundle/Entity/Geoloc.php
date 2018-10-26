<?php
// src/AppBundle/Entity/Geoloc.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QUESTION nullable
 * @ORM\Entity
 * @ORM\Table(name="geoloc")
 */
class Geoloc
{

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
	 * @var null|string
	 *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
*/
    private $adresse;

	/**
	 * @var null|int
	 *
	 * @ORM\Column(name="cpostal", type="integer", length=5, nullable=true)
	 */
	private $cpostal;

	/**
	 * @var null|string
	 *
	 * @ORM\Column(name="ville", type="string", length=100, nullable=true)
	 */
	private $ville;

	/**
	 * @var null|float
	 *
	 * @ORM\Column(name="lat", type="decimal", precision=10, scale=7, nullable=true)
	 */
	private $lat;

	/**
	 * @var null|float
	 *
	 * @ORM\Column(name="lon", type="decimal", precision=10, scale=7, nullable=true)
	 */
	private $lon;


	/**
	 * @return int
	 */
	public function getId(): int
    {
        return $this->id;
    }

	/**
	 * @return null|string
	 */
	public function getAdresse(): ?string
	{
		return $this->adresse;
	}

	/**
	 * @param null|string $adresse
	 * @return Geoloc
	 */
	public function setAdresse(?string $adresse)
	{
		$this->adresse = $adresse;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getCpostal(): ?int
	{
		return $this->cpostal;
	}

	/**
	 * @param int|null $cpostal
	 * @return Geoloc
	 */
	public function setCpostal(?int $cpostal)
	{
		$this->cpostal = $cpostal;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getVille(): ?string
	{
		return $this->ville;
	}

	/**
	 * @param null|string $ville
	 * @return Geoloc
	 */
	public function setVille(?string $ville)
	{
		$this->ville = $ville;
		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getLat(): ?float
	{
		return $this->lat;
	}

	/**
	 * @param float|null $lat
	 * @return Geoloc
	 */
	public function setLat(?float $lat)
	{
		$this->lat = $lat;
		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getLon(): ?float
	{
		return $this->lon;
	}

	/**
	 * @param float|null $lon
	 * @return Geoloc
	 */
	public function setLon(?float $lon)
	{
		$this->lon = $lon;
		return $this;
	}
}