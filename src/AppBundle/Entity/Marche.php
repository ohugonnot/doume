<?php
// src/AppBundle/Entity/Marche.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\ContactEmailTelTrait;
use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use AppBundle\Entity\EntityTrait\GeolocEntityTrait;
use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="marche")
 */
class Marche
{
	use NameSlugContentEntityTrait, GeolocEntityTrait, EnablableEntityTrait, ContactEmailTelTrait;

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
	 * QUESTION : factorise avec AMAP
     * @ORM\Column(name="contact", type="string", length=100)
     */
    private $contact;

	/**
	 * @var string
	 * QUESTION : factorise avec AMAP
	 * @ORM\Column(name="jour", type="string", length=255)
     */
    private $jour;

    /**
     * @var ArrayCollection|Prestataire[]
	 *
     * @ORM\ManyToMany(targetEntity="Prestataire", inversedBy="marches", cascade={"persist"}, fetch="EXTRA_LAZY")
     */
    private $prestataires;

    public function __construct()
	{
		$this->prestataires = new ArrayCollection();
	}

	/**
     * @return mixed
     */
    public function getId()
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
	 * @return Marche
	 */
	public function setContact(string $contact)
	{
		$this->contact = $contact;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getJour(): string
	{
		return $this->jour;
	}

	/**
	 * @param string $jour
	 * @return Marche
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
            $prestataire->addMarche($this);
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
            $prestataire->removeMarche($this);
        }
        return $this;
    }
}
