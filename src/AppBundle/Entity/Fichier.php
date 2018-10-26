<?php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\FileEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"fichier" = "Fichier", "image" = "Image"})
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="fichier")
 */
class Fichier
{
	use FileEntityTrait;

	/**
	 * @var int
	 *
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @Assert\File(
	 *     maxSize = "1024k",
	 *     mimeTypes = {"application/pdf", "application/x-pdf"},
	 *     mimeTypesMessage = "Please upload a valid PDF"
	 * )
	 */
	protected $file;

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

}