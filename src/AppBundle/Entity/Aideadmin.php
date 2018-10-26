<?php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="aide_admin")
 */
class AideAdmin
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
	 * @var string
	 *
     * @ORM\Column(name="route", type="string", length=100, nullable=true)
     */
    private $route;

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
	public function getRoute(): string
	{
		return $this->route;
	}

	/**
	 * @param string $route
	 * @return AideAdmin
	 */
	public function setRoute(string $route): AideAdmin
	{
		$this->route = $route;
		return $this;
	}
}