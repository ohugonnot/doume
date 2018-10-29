<?php

namespace AppBundle\Entity\EntityTrait;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

trait HasCompteEntity
{
	/**
	 * @var int
	 *
	 * @ORM\Column(name="compte", type="decimal", precision=7, scale=2)
	 */
	private $compte = 0;

	/**
	 * @return int
	 */
	public function getCompte(): float
	{
		return $this->compte;
	}

	/**
	 * @param int $compte
	 * @return $this
	 */
	public function setCompte(float $compte)
	{
		$this->compte = $compte;
		return $this;
	}
}
