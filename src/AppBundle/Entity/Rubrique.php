<?php
// src/AppBundle/Entity/Rubrique.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="rubrique")
 */
class Rubrique
{
	use NameSlugContentEntityTrait;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var ArrayCollection|Prestataire[]
	 *
     * @ORM\ManyToMany(targetEntity="Prestataire", inversedBy="rubriques", cascade={"persist"}, fetch="EXTRA_LAZY")
     */
    private $prestataires;

	/**
	 * @var ArrayCollection|Annonce[]
	 *
	 * @ORM\ManyToMany(targetEntity="Annonce", inversedBy="rubriques", cascade={"persist"}, fetch="EXTRA_LAZY")
	 */
	private $annonces;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
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
            $prestataire->addRubrique($this);
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
            $prestataire->removeRubrique($this);
        }
        return $this;
    }

	/**
	 * @return Annonce[]|ArrayCollection
	 */
	public function getAnnonces()
	{
		return $this->annonces;
	}

	/**
	 * @param Annonce $annonce
	 * @return $this
	 */
	public function addAnnonce(Annonce $annonce)
	{
		if (!$this->annonces->contains($annonce)) {
			$this->annonces[] = $annonce;
			$annonce->addRubrique($this);
		}
		return $this;
	}

	/**
	 * @param Annonce $annonce
	 * @return $this
	 */
	public function removeAnnonce(Annonce $annonce)
	{
		if ($this->annonces->contains($annonce)) {
			$this->annonces->removeElement($annonce);
			$annonce->removeRubrique($this);
		}
		return $this;
	}
}