<?php
// src/AppBundle/Entity/Groupe.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\HasCompteEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\Group as BaseGroup;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupeRepository")
 * @ORM\Table(name="groupe")
 */
class Groupe extends BaseGroup
{
	use HasCompteEntity;

    /**
	 * @var int
	 *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 * @var ArrayCollection|User[]
	 *
	 * @ORM\ManyToMany(targetEntity="User", inversedBy="groups", cascade={"persist"}, fetch="EXTRA_LAZY")
	 */
	private $users;

	/**
	 * @var ArrayCollection|User[]
	 * @ORM\OneToMany(targetEntity="User", mappedBy="gestionnaireGroup", cascade={"persist"})
	 */
	private $gestionnaires;

	/**
	 * @var ArrayCollection|User[]
	 * @ORM\OneToMany(targetEntity="User", mappedBy="redacteurGroup", cascade={"persist"})
	 */
	private $redacteurs;

	/**
	 * @var ArrayCollection|User[]
	 * @ORM\OneToMany(targetEntity="User", mappedBy="tresorierGroup", cascade={"persist"})
	 */
	private $tresoriers;

	/**
	 * @var ArrayCollection|User[]
	 * @ORM\OneToMany(targetEntity="User", mappedBy="contactGroup", cascade={"persist"})
	 */
	private $contacts;

	/**
	 * @var ArrayCollection|Prestataire[]
	 * @ORM\OneToMany(targetEntity="Prestataire", mappedBy="prestataireGroup", cascade={"persist"})
	 */
	private $prestataires;

	/**
	 * @var ArrayCollection|Comptoir[]
	 * @ORM\OneToMany(targetEntity="Comptoir", mappedBy="comptoirGroup", cascade={"persist"})
	 */
	private $comptoirs;

	public function __construct(string $name, array $roles = array())
	{
		$this->users = new ArrayCollection();
		$this->gestionnaires = new ArrayCollection();
		$this->redacteurs = new ArrayCollection();
		$this->tresoriers = new ArrayCollection();
		$this->contacts = new ArrayCollection();
		$this->prestataires = new ArrayCollection();
		$this->comptoirs = new ArrayCollection();

		parent::__construct($name, $roles);
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return User[]|ArrayCollection
	 */
	public function getUsers()
	{
		return $this->users;
	}

	/**
	 * @param User $user
	 * @return $this
	 */
	public function addUser(User $user)
	{
		if (!$this->users->contains($user)) {
			$this->users[] = $user;
			$user->addGroup($this);
		}
		return $this;
	}

	/**
	 * @param User $user
	 * @return $this
	 */
	public function removeUser(User $user)
	{
		if ($this->users->contains($user)) {
			$this->users->removeElement($user);
			$user->removeGroup($this);
		}
		return $this;
	}

	/**
	 * @return User[]|ArrayCollection
	 */
	public function getGestionnaires()
	{
		return $this->gestionnaires;
	}

	/**
	 * @param User $gestionnaire
	 * @return $this
	 */
	public function addGestionnaire(User $gestionnaire)
	{
		if (!$this->gestionnaires->contains($gestionnaire)) {
			$this->gestionnaires[] = $gestionnaire;
			$gestionnaire->setGestionnaireGroup($this);
		}
		return $this;
	}

	/**
	 * @param User $gestionnaire
	 * @return $this
	 */
	public function removeGestionnaire(User $gestionnaire)
	{
		if ($this->gestionnaires->contains($gestionnaire)) {
			$this->gestionnaires->removeElement($gestionnaire);
			$gestionnaire->setGestionnaireGroup(null);
		}
		return $this;
	}

	/**
	 * @return User[]|ArrayCollection
	 */
	public function getRedacteurs()
	{
		return $this->redacteurs;
	}

	/**
	 * @param User $redacteur
	 * @return $this
	 */
	public function addRedacteur(User $redacteur)
	{
		if (!$this->redacteurs->contains($redacteur)) {
			$this->redacteurs[] = $redacteur;
			$redacteur->setRedacteurGroup($this);
		}
		return $this;
	}

	/**
	 * @param User $redacteur
	 * @return $this
	 */
	public function removeRedacteur(User $redacteur)
	{
		if ($this->redacteurs->contains($redacteur)) {
			$this->redacteurs->removeElement($redacteur);
			$redacteur->setRedacteurGroup(null);
		}
		return $this;
	}

	/**
	 * @return User[]|ArrayCollection
	 */
	public function getTresoriers()
	{
		return $this->tresoriers;
	}

	/**
	 * @param User $tresorier
	 * @return $this
	 */
	public function addTresorier(User $tresorier)
	{
		if (!$this->tresoriers->contains($tresorier)) {
			$this->tresoriers[] = $tresorier;
			$tresorier->setTresorierGroup($this);
		}
		return $this;
	}

	/**
	 * @param User $tresorier
	 * @return $this
	 */
	public function removeTresorier(User $tresorier)
	{
		if ($this->tresoriers->contains($tresorier)) {
			$this->tresoriers->removeElement($tresorier);
			$tresorier->setTresorierGroup(null);
		}
		return $this;
	}

	/**
	 * @return User[]|ArrayCollection
	 */
	public function getContacts()
	{
		return $this->contacts;
	}

	/**
	 * @param User $contact
	 * @return $this
	 */
	public function addContact(User $contact)
	{
		if (!$this->contacts->contains($contact)) {
			$this->contacts[] = $contact;
			$contact->setContactGroup($this);
		}
		return $this;
	}

	/**
	 * @param User $contact
	 * @return $this
	 */
	public function removeContact(User $contact)
	{
		if ($this->contacts->contains($contact)) {
			$this->contacts->removeElement($contact);
			$contact->setContactGroup(null);
		}
		return $this;
	}

	/**
	 * @return Prestataire[]|ArrayCollection
	 */
	public function getPrestataires()
	{
		return $this->prestataires;
	}

	/**
	 * @param Prestataire $prestataire
	 * @return $this
	 */
	public function addPrestataire(Prestataire $prestataire)
	{
		if (!$this->prestataires->contains($prestataire)) {
			$this->prestataires[] = $prestataire;
			$prestataire->setPrestataireGroup($this);
		}
		return $this;
	}

	/**
	 * @param Prestataire $prestataire
	 * @return $this
	 */
	public function removePrestataire(Prestataire $prestataire)
	{
		if ($this->prestataires->contains($prestataire)) {
			$this->prestataires->removeElement($prestataire);
			$prestataire->setPrestataireGroup(null);
		}
		return $this;
	}

	/**
	 * @return Comptoir[]|ArrayCollection
	 */
	public function getComptoirs()
	{
		return $this->comptoirs;
	}

	/**
	 * @param Comptoir $comptoir
	 * @return $this
	 */
	public function addComptoir(Comptoir $comptoir)
	{
		if (!$this->comptoirs->contains($comptoir)) {
			$this->comptoirs[] = $comptoir;
			$comptoir->setComptoirGroup($this);
		}
		return $this;
	}

	/**
	 * @param Comptoir $comptoir
	 * @return $this
	 */
	public function removeComptoir(Comptoir $comptoir)
	{
		if ($this->comptoirs->contains($comptoir)) {
			$this->comptoirs->removeElement($comptoir);
			$comptoir->setComptoirGroup(null);
		}
		return $this;
	}
}
