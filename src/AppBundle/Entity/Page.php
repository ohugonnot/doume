<?php
// src/AppBundle/Entity/Page.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="page")
 */
class Page
{
	use NameSlugContentEntityTrait,
		TimestampableEntity,
		EnablableEntityTrait;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
	 * @var null|string
	 *
     * @ORM\Column(name="js", type="text", nullable=true)
     */
    private $js;

	/**
	 * @var null|string
	 *
	 * @ORM\Column(name="css", type="text", nullable=true)
     */
    private $css;

	/**
	 * @var null|string
	 *
	 * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $metaDescription;

	/**
	 * @var null|string
	 *
     * @ORM\Column(name="tag", type="string", length=255, nullable=true)
     */
    private $metaTags;

	/**
	 * @var null|string
	 *
	 * @ORM\Column(name="template", type="string", length=255, nullable=true)
	 */
	private $template;

    /**
	 * @var User
	 *
     * @ORM\ManyToOne(targetEntity="User", cascade={"persist"}, inversedBy="pages")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

	/**
	 * @return null|string
	 */
	public function getJs(): ?string
	{
		return $this->js;
	}

	/**
	 * @param null|string $js
	 * @return Page
	 */
	public function setJs(?string $js)
	{
		$this->js = $js;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCss(): ?string
	{
		return $this->css;
	}

	/**
	 * @param null|string $css
	 * @return Page
	 */
	public function setCss(?string $css)
	{
		$this->css = $css;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getMetaDescription(): ?string
	{
		return $this->metaDescription;
	}

	/**
	 * @param null|string $metaDescription
	 * @return Page
	 */
	public function setMetaDescription(?string $metaDescription)
	{
		$this->metaDescription = $metaDescription;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getMetaTags(): ?string
	{
		return $this->metaTags;
	}

	/**
	 * @param null|string $metaTags
	 * @return Page
	 */
	public function setMetaTags(?string $metaTags)
	{
		$this->metaTags = $metaTags;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTemplate(): ?string
	{
		return $this->template;
	}

	/**
	 * @param null|string $template
	 * @return Page
	 */
	public function setTemplate(?string $template)
	{
		$this->template = $template;
		return $this;
	}

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Page
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
}