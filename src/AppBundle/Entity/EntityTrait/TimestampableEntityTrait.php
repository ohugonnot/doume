<?php
namespace AppBundle\Entity\EntityTrait;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

trait TimestampableEntityTrait
{
	/**
	 * @var \DateTime
	 *
	 * @Gedmo\Timestampable(on="create")
	 * @ORM\Column(type="datetime")
	 * @Assert\DateTime()
	 */
	protected $createdAt;

	/**
	 * @var \DateTime
	 *
	 * @Gedmo\Timestampable(on="update")
	 * @ORM\Column(type="datetime")
	 * @Assert\DateTime()
	 */
	protected $updatedAt;

	public function setCreatedAt(\DateTime $createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	public function getCreatedAt(): \DateTime
	{
		return $this->createdAt;
	}

	public function setUpdatedAt(\DateTime $updatedAt)
	{
		$this->updatedAt = $updatedAt;

		return $this;
	}

	public function getUpdatedAt(): \DateTime
	{
		return $this->updatedAt;
	}
}