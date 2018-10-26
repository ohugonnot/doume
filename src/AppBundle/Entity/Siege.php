<?php
// src/AppBundle/Entity/Siege.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="siege")
 */
class Siege
{
	use NameSlugContentEntityTrait;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 * @var int
	 * QUESTION
	 * @ORM\Column(name="compte", type="integer", length=5)
     */
    private $compte;

	/**
	 * @return int
	 */
	public function getCompte(): int
	{
		return $this->compte;
	}

	/**
	 * @param int $compte
	 * @return Siege
	 */
	public function setCompte(int $compte)
	{
		$this->compte = $compte;
		return $this;
	}
}
