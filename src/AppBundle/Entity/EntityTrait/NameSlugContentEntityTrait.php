<?php

namespace AppBundle\Entity\EntityTrait;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

trait NameSlugContentEntityTrait
{
	/**
	 * @var string|null
	 *
	 * @ORM\Column(length=150)
	 * @Assert\NotBlank
	 * @Assert\Length(max=150)
	 */
	protected $name;

	/**
	 * @var string|null
	 *
	 * @Gedmo\Slug(fields={"name"})
	 * @ORM\Column(length=150, unique=true)
	 */
	protected $slug;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(type="text", nullable=true)
	 */
	private $content;

	public function getContent(): ?string
	{
		return $this->content;
	}

	public function setDescription(?string $content)
	{
		$this->setContent($content);
		return $this;
	}

	public function getDescription(): ?string
	{
		return $this->getContent();
	}

	public function setContent(?string $content)
	{
		$this->content = $content;
		return $this;
	}

	public function __toString(): string
	{
		return $this->name;
	}

	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(?string $name)
	{
		$this->name = $name;
		return $this;
	}

	public function getTitle(): ?string
	{
		return $this->getName();
	}

	public function setTitle(?string $name)
	{
		$this->setName($name);
		return $this;
	}

	public function getSlug(): ?string
	{
		return $this->slug;
	}

	public function setSlug(?string $slug)
	{
		$this->slug = $slug;
		return $this;
	}
}