<?php
// src/AppBundle/Entity/Promo.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;


/**
 * @ORM\Entity
 * @ORM\Table(name="promo")
 */
class Promo
{
	use TimestampableEntity, EnablableEntityTrait, NameSlugContentEntityTrait;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 * @var Prestataire
	 *
	 * @ORM\ManyToOne(targetEntity="Prestataire", inversedBy="promos")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
	 */
	private $prestataire;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

	/**
	 * @param Prestataire $prestataire
	 * @return $this
	 */
	public function setPrestataire(Prestataire $prestataire)
	{
		$this->prestataire = $prestataire;
		return $this;
	}

	/**
	 * @return Prestataire
	 */
	public function getPrestataire(): Prestataire
	{
		return $this->prestataire;
	}
}
