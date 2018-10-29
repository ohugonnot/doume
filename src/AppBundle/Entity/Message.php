<?php
// src/AppBundle/Entity/Message.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\EnablableEntityTrait;
use AppBundle\Entity\EntityTrait\NameSlugContentEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="message")
 */
class Message
{

	use NameSlugContentEntityTrait,
		EnablableEntityTrait,
		TimestampableEntity;
	
    /**
	 * @var int
	 * 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 * @var User
	 * 
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="messagesSend", cascade={"persist"})
	 */
	private $expediteur;

	/**
	 * @var User
	 *
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="messagesReceived", cascade={"persist"})
	 */
	private $destinataire;

    /**
     * @return int
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
}