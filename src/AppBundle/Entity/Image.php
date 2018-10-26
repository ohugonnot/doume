<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Image extends Fichier
{
	/**
	 * @Assert\Image()
	 */
	protected $file;

	/**
	 * @var null|int
	 *
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $width;

	/**
	 * @var null|int
	 *
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $height;

	/**
	 * @return int|null
	 */
	public function getWidth(): ?int
	{
		return $this->width;
	}

	/**
	 * @param int|null $width
	 * @return $this
	 */
	public function setWidth(?int $width)
	{
		$this->width = $width;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getHeight(): ?int
	{
		return $this->height;
	}

	/**
	 * @param int|null $height
	 * @return $this
	 */
	public function setHeight(?int $height)
	{
		$this->height = $height;
		return $this;
	}

	/**
	 * @ORM\PreFlush()
	 */
	public function upload()
	{
		if ($this->getFile() != null) {
			list($width, $height) = getimagesize($this->getAbsolutePath());
			$this->setWidth($width)->setHeight($height);
		}

		parent::upload();
	}


}