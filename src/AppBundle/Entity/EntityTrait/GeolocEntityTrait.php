<?php

namespace AppBundle\Entity\EntityTrait;

use AppBundle\Entity\Geoloc;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

trait GeolocEntityTrait
{
	/**
	 * @var Geoloc
	 *
	 * @ORM\OneToOne(targetEntity="Geoloc", cascade={"persist"}, orphanRemoval=true)
	 */
	private $geoloc;

	public function getGeoloc(): Geoloc
	{
		return $this->geoloc;
	}

	public function setGeoloc(Geoloc $geoloc)
	{
		$this->geoloc = $geoloc;
		return $this;
	}
}