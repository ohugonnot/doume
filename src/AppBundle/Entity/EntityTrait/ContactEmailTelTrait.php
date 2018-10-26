<?php

namespace AppBundle\Entity\EntityTrait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait ContactEmailTelTrait
{
	/**
	 * @var null|string
	 *
	 * @ORM\Column(name="tel", type="string", length=15, nullable=true)
	 */
	protected $tel;

	/**
	 * @var null|string
	 *
	 * @ORM\Column(name="email", type="string", length=100, nullable=true)
	 */
	protected $email;

	public function getTel(): ?string
	{
		return $this->tel;
	}

	public function setTel(?string $tel)
	{
		$this->tel = $tel;
		return $this;
	}

	public function getEmail(): ?string
	{
		return $this->email;
	}

	public function setEmail(?string $email)
	{
		$this->email = $email;
		return $this;
	}
}