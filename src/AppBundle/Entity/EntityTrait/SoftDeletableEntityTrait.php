<?php

namespace AppBundle\Entity\EntityTrait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait SoftDeletableEntityTrait
{
	/**
	 * @var \DateTime|null
	 *
	 * @ORM\Column(type="datetime", nullable=true)
	 * @Assert\DateTime()
	 */
	private $deletedAt;

	/**
	 * @param \DateTime|null $deletedAt
	 *
	 * @return $this
	 */
	public function setDeletedAt(?\DateTime $deletedAt = null)
	{
		$this->deletedAt = $deletedAt;

		return $this;
	}

	public function getDeletedAt(): ?\DateTime
	{
		return $this->deletedAt;
	}

	public function isDeleted(): bool
	{
		return null !== $this->deletedAt;
	}
}
