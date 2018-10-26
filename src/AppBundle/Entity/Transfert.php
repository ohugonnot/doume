<?php
// src/AppBundle/Entity/Transfert.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * QUESTION
 * @ORM\Entity
 * @ORM\Table(name="transfert")
 */
class Transfert
{
	use TimestampableEntity, EnablableEntityTrait;

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
     * @ORM\Column(name="operateur", type="string", length=20)
     */
    private $operateur;

	/**
	 * @var string
	 *
     * @ORM\Column(name="type", type="string", length=3)
     */
    private $type;

	/**
	 * @var string
	 * QUESTION
     * @ORM\Column(name="expediteur", type="string", length=100)
     */
    private $expediteur;

	/**
	 * @var string
	 * QUESTION
     * @ORM\Column(name="destinataire", type="string", length=100)
     */
    private $destinataire;

	/**
	 * @var float
	 *
     * @ORM\Column(name="montant", type="decimal", precision=7, scale=2)
     */
    private $montant;

	/**
	 * @var null|string
	 *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;
}