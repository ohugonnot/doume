<?php
// src/AppBundle/Entity/Transaction.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="transaction")
 */
class Transaction
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
     * @ORM\Column(name="type", type="string", length=3)
     */
    private $type;

	/**
	 * @var float
	 *
     * @ORM\Column(name="montant", type="decimal", precision=7, scale=2)
     */
    private $montant;

	/**
	 * @var null|string
	 *
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $reference;

	/**
	 * @var User
	 *
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="transactionsSend", cascade={"persist"})
	 */
	private $expediteur;

	/**
	 * @var User
	 *
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="transactionsReceived", cascade={"persist"})
	 */
	private $destinataire;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

	/**
	 * @param User $destinataire
	 * @return $this
	 */
	public function setDestinataire(User $destinataire)
	{
		$this->destinataire = $destinataire;
		return $this;
	}

	/**
	 * @return User
	 */
	public function getDestinataire(): User
	{
		return $this->destinataire;
	}

	/**
	 * @param User $expediteur
	 * @return $this
	 */
	public function setExpediteur(User $expediteur)
	{
		$this->expediteur = $expediteur;
		return $this;
	}

	/**
	 * @return User
	 */
	public function getExpediteur(): User
	{
		return $this->expediteur;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return Transaction
	 */
	public function setType(string $type)
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getMontant(): float
	{
		return $this->montant;
	}

	/**
	 * @param float $montant
	 * @return Transaction
	 */
	public function setMontant(float $montant)
	{
		$this->montant = $montant;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getReference(): ?string
	{
		return $this->reference;
	}

	/**
	 * @param null|string $reference
	 * @return Transaction
	 */
	public function setReference(?string $reference)
	{
		$this->reference = $reference;
		return $this;
	}
}