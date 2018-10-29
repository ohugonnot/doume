<?php
// src/AppBundle/Entity/Amap.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\ContactEmailTelTrait;
use AppBundle\Entity\EntityTrait\GeolocEntityTrait;
use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use AppBundle\Entity\EntityTrait\TimestampableEntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="amap")
 */
class Amap
{

	use NameSlugContentEntityTrait,
		TimestampableEntityTrait,
		GeolocEntityTrait,
		ContactEmailTelTrait;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
	 * @var string
	 * QUESTION
     * @ORM\Column(name="contact", type="string", length=200, nullable=true)
     */
    private $contact;

    /**
	 * @var string
	 * QUESTION
	 * @ORM\Column(name="jour", type="string", length=255, nullable=true)
     */
    private $jour;

    /**
     * @var ArrayCollection|Prestataire[]
	 *
     * @ORM\ManyToMany(targetEntity="Prestataire", inversedBy="amaps", cascade={"persist"}, fetch="EXTRA_LAZY")
     */
    private $prestataires;

	public function __construct()
	{
		$this->prestataires = new ArrayCollection();
	}

	/**
	 * @return int
	 */
	public function getId(): int
    {
        return $this->id;
    }

	/**
	 * @return string
	 */
	public function getContact(): string
	{
		return $this->contact;
	}

	/**
	 * @param string $contact
	 * @return Amap
	 */
	public function setContact(string $contact)
	{
		$this->contact = $contact;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getJour()
	{
		return $this->jour;
	}

	/**
	 * @param string $jour
	 * @return Amap
	 */
	public function setJour(string $jour)
	{
		$this->jour = $jour;
		return $this;
	}

    /**
     * @return Prestataire[]|ArrayCollection
     */
    public function getPrestataires()
    {
        return $this->prestataires;
    }

    /**
     * @param Prestataire $prestataire
     * @return $this
     */
    public function addPrestataire(Prestataire $prestataire)
    {
        if (!$this->prestataires->contains($prestataire)) {
            $this->prestataires[] = $prestataire;
            $prestataire->addAmap($this);
        }
        return $this;
    }

    /**
     * @param Prestataire $prestataire
     * @return $this
     */
    public function removePrestataire(Prestataire $prestataire)
    {
        if ($this->prestataires->contains($prestataire)) {
            $this->prestataires->removeElement($prestataire);
            $prestataire->removeAmap($this);
        }
        return $this;
    }
}
