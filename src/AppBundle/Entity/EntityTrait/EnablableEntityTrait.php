<?php

namespace AppBundle\Entity\EntityTrait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait EnablableEntityTrait
{
	/**
	 * @var boolean
	 * @Assert\Type("bool")
	 * @ORM\Column(type="boolean")
	 */
	protected $enabled = true;

	public function isEnabled(): bool
	{
		return $this->enabled;
	}

	public function setEnabled(bool $enabled)
	{
		$this->enabled = $enabled;
		return $this;
	}


}