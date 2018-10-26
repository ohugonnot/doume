<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityTrait\GeolocEntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\GroupInterface;
use FOS\UserBundle\Model\User as BaseUser;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{

	use TimestampableEntity, GeolocEntityTrait;

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
	 * @ORM\Column(name="mlc", type="string", length=30, nullable=true)
     */
    private $mlc;

	/**
	 * @var string
	 *
     * @ORM\Column(name="nom", type="string", length=30, nullable=true)
     */
    private $nom;

	/**
	 * @var string
	 *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=true)
     */
    private $prenom;

	/**
	 * @var string
	 *
     * @ORM\Column(name="mobile", type="string", length=15, nullable=true)
     */
    private $mobile;

	/**
	 * @var string
	 *
     * @ORM\Column(name="tel", type="string", length=15, nullable=true)
     */
    private $tel;

	/**
	 * @var float
	 *
     * @ORM\Column(name="ecompte", type="decimal", precision=7, scale=2)
     */
    private $ecompte = 0;

    /**
	 * @var Prestataire
	 *
     * @ORM\OneToOne(targetEntity="Prestataire", cascade={"all"}, orphanRemoval=true, mappedBy="user")
     */
    private $prestataire;

	/**
	 * @var Comptoir
	 *
	 * @ORM\OneToOne(targetEntity="Comptoir", cascade={"all"}, orphanRemoval=true, mappedBy="user")
	 */
	private $comptoir;

    /**
     * @var ArrayCollection|Cotisation[]
	 *
     * @ORM\OneToMany(targetEntity="Cotisation", mappedBy="user", cascade={"all"}, orphanRemoval=true)
     */
    private $cotisations;

    /**
     * @var ArrayCollection|Annonce[]
	 *
     * @ORM\OneToMany(targetEntity="Annonce", mappedBy="user", cascade={"all"}, orphanRemoval=true)
     */
    private $annonces;

	/**
	 * @var ArrayCollection|Document[]
	 *
	 * @ORM\OneToMany(targetEntity="Document", mappedBy="user", cascade={"all"}, orphanRemoval=true)
	 */
	private $documents;

	/**
	 * @var ArrayCollection|Faq[]
	 *
	 * @ORM\OneToMany(targetEntity="Faq", mappedBy="user", cascade={"all"}, orphanRemoval=true)
	 */
	private $faqs;

	/**
	 * @var ArrayCollection|Lien[]
	 *
	 * @ORM\OneToMany(targetEntity="Lien", mappedBy="user", cascade={"all"}, orphanRemoval=true)
	 */
	private $liens;

	/**
	 * @var ArrayCollection|News[]
	 *
	 * @ORM\OneToMany(targetEntity="News", mappedBy="user", cascade={"all"}, orphanRemoval=true)
	 */
	private $news;

	/**
	 * @var ArrayCollection|Page[]
	 *
	 * @ORM\OneToMany(targetEntity="Page", mappedBy="user", cascade={"all"}, orphanRemoval=true)
	 */
	private $pages;

	/**
	 * @var ArrayCollection|Groupe[]
	 *
	 * @ORM\ManyToMany(targetEntity="Groupe", mappedBy="users", cascade={"persist"})
	 * @ORM\JoinTable(name="user_group",
	 *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
	 * )
	 */
	protected $groups;

	/**
	 * @var ArrayCollection|Message[]
	 *
	 * @ORM\OneToMany(targetEntity="Message", mappedBy="expediteur", cascade={"persist"})
	 */
	private $messagesSend;

	/**
	 * @var ArrayCollection|Message[]
	 *
	 * @ORM\OneToMany(targetEntity="Message", mappedBy="destinataire", cascade={"persist"})
	 */
	private $messagesReceived;

	/**
	 * @var ArrayCollection|Transaction[]
	 *
	 * @ORM\OneToMany(targetEntity="Transaction", mappedBy="expediteur", cascade={"persist"})
	 */
	private $transactionsSend;

	/**
	 * @var ArrayCollection|Transaction[]
	 *
	 * @ORM\OneToMany(targetEntity="Transaction", mappedBy="destinataire", cascade={"persist"})
	 */
	private $transactionsReceived;

    public function __construct()
    {
        parent::__construct();
        $this->cotisations = new ArrayCollection();
        $this->annonces = new ArrayCollection();
		$this->groups = new ArrayCollection();
		$this->messagesSend = new ArrayCollection();
		$this->messagesReceived = new ArrayCollection();
		$this->transactionsSend = new ArrayCollection();
		$this->transactionsReceived = new ArrayCollection();
		$this->documents = new ArrayCollection();
		$this->faqs = new ArrayCollection();
		$this->liens = new ArrayCollection();
		$this->news = new ArrayCollection();
		$this->pages = new ArrayCollection();
    }

    /**
     * @return Cotisation[]|ArrayCollection
     */
    public function getCotisations()
    {
        return $this->cotisations;
    }

    /**
     * @param Cotisation $cotisation
     * @return $this
     */
    public function addCotisation(Cotisation $cotisation)
    {
        if (!$this->cotisations->contains($cotisation)) {
            $this->cotisations[] = $cotisation;
            $cotisation->setUser($this);
        }
        return $this;
    }

    /**
     * @param Cotisation $cotisation
     * @return $this
     */
    public function removeCotisation(Cotisation $cotisation)
    {
        if ($this->cotisations->contains($cotisation)) {
            $this->cotisations->removeElement($cotisation);
        }
        return $this;
    }

    /**
     * @return Annonce[]|ArrayCollection
     */
    public function getAnnonces()
    {
        return $this->annonces;
    }

    /**
     * @param Annonce $annonce
     * @return $this
     */
    public function addAnnonce(Annonce $annonce)
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setUser($this);
        }
        return $this;
    }

    /**
     * @param Annonce $annonce
     * @return $this
     */
    public function removeAnnonce(Annonce $annonce)
    {
        if ($this->annonces->contains($annonce)) {
            $this->annonces->removeElement($annonce);
        }
        return $this;
    }

	/**
	 * @return Message[]|ArrayCollection
	 */
	public function getMessagesSend()
	{
		return $this->messagesSend;
	}

	/**
	 * @param Message $message
	 * @return $this
	 */
	public function addMessageSend(Message $message)
	{
		if (!$this->messagesSend->contains($message)) {
			$this->messagesSend[] = $message;
			$message->setExpediteur($this);
		}
		return $this;
	}

	/**
	 * @param Message $message
	 * @return $this
	 */
	public function removeMessageSend(Message $message)
	{
		if ($this->messagesSend->contains($message)) {
			$this->messagesSend->removeElement($message);
			$message->setexpediteur(null);
		}
		return $this;
	}

	/**
	 * @return Message[]|ArrayCollection
	 */
	public function getMessagesReceived()
	{
		return $this->messagesReceived;
	}

	/**
	 * @param Message $message
	 * @return $this
	 */
	public function addMessageReceived(Message $message)
	{
		if (!$this->messagesReceived->contains($message)) {
			$this->messagesReceived[] = $message;
			$message->setDestinataire($this);
		}
		return $this;
	}

	/**
	 * @param Message $message
	 * @return $this
	 */
	public function removeMessageReceived(Message $message)
	{
		if ($this->messagesReceived->contains($message)) {
			$this->messagesReceived->removeElement($message);
			$message->setDestinataire(null);
		}
		return $this;
	}

	/**
	 * @return Transaction[]|ArrayCollection
	 */
	public function getTransactionsSend()
	{
		return $this->transactionsSend;
	}

	/**
	 * @param Transaction $transaction
	 * @return $this
	 */
	public function addTransactionSend(Transaction $transaction)
	{
		if (!$this->transactionsSend->contains($transaction)) {
			$this->transactionsSend[] = $transaction;
			$transaction->setExpediteur($this);
		}
		return $this;
	}

	/**
	 * @param Transaction $transaction
	 * @return $this
	 */
	public function removeTransactionSend(Transaction $transaction)
	{
		if ($this->transactionsSend->contains($transaction)) {
			$this->transactionsSend->removeElement($transaction);
		}
		return $this;
	}

	/**
	 * @return Transaction[]|ArrayCollection
	 */
	public function getTransactionsReceived()
	{
		return $this->transactionsReceived;
	}

	/**
	 * @param Transaction $transaction
	 * @return $this
	 */
	public function addTransactionReceived(Transaction $transaction)
	{
		if (!$this->transactionsReceived->contains($transaction)) {
			$this->transactionsReceived[] = $transaction;
			$transaction->setDestinataire($this);
		}
		return $this;
	}

	/**
	 * @param Transaction $transaction
	 * @return $this
	 */
	public function removeTransactionReceived(Transaction $transaction)
	{
		if ($this->transactionsReceived->contains($transaction)) {
			$this->transactionsReceived->removeElement($transaction);
		}
		return $this;
	}

    /**
     * @return bool
     */
    public function isPrestataire(): Bool
    {
        return $this->getPrestataire() != null;
    }

    /**
     * @return Prestataire
     */
    public function getPrestataire(): Prestataire
    {
        return $this->prestataire;
    }

    /**
     * @param Prestataire $prestataire
     * @return User
     */
    public function setPrestataire(Prestataire $prestataire)
    {
        $this->prestataire = $prestataire;
        $prestataire->setUser($this);
        return $this;
    }

	/**
	 * @return bool
	 */
	public function isComptoir(): Bool
	{
		return $this->getComptoir() != null;
	}

	/**
	 * @return Comptoir
	 */
	public function getComptoir(): Comptoir
	{
		return $this->comptoir;
	}

	/**
	 * @param Comptoir $comptoir
	 * @return User
	 */
	public function setComptoir(Comptoir $comptoir)
	{
		$this->comptoir = $comptoir;
		$comptoir->setUser($this);
		return $this;
	}

	/**
	 * @return Document[]|ArrayCollection
	 */
	public function getDocuments()
	{
		return $this->documents;
	}

	/**
	 * @param Document $document
	 * @return $this
	 */
	public function addDocument(Document $document)
	{
		if (!$this->documents->contains($document)) {
			$this->documents[] = $document;
			$document->setUser($this);
		}
		return $this;
	}

	/**
	 * @param Document $document
	 * @return $this
	 */
	public function removeDocument(Document $document)
	{
		if ($this->documents->contains($document)) {
			$this->documents->removeElement($document);
			$document->setUser(null);
		}
		return $this;
	}

	/**
	 * @return Faq[]|ArrayCollection
	 */
	public function getFaqs()
	{
		return $this->faqs;
	}

	/**
	 * @param Faq $faq
	 * @return $this
	 */
	public function addFaq(Faq $faq)
	{
		if (!$this->faqs->contains($faq)) {
			$this->faqs[] = $faq;
			$faq->setUser($this);
		}
		return $this;
	}

	/**
	 * @param Faq $faq
	 * @return $this
	 */
	public function removeFaq(Faq $faq)
	{
		if ($this->faqs->contains($faq)) {
			$this->faqs->removeElement($faq);
			$faq->setUser(null);
		}
		return $this;
	}

	/**
	 * @return Lien[]|ArrayCollection
	 */
	public function getLiens()
	{
		return $this->liens;
	}

	/**
	 * @param Lien $lien
	 * @return $this
	 */
	public function addLien(Lien $lien)
	{
		if (!$this->liens->contains($lien)) {
			$this->liens[] = $lien;
			$lien->setUser($this);
		}
		return $this;
	}

	/**
	 * @param Lien $lien
	 * @return $this
	 */
	public function removeLien(Lien $lien)
	{
		if ($this->liens->contains($lien)) {
			$this->liens->removeElement($lien);
		}
		return $this;
	}

	/**
	 * @return News[]|ArrayCollection
	 */
	public function getNews()
	{
		return $this->news;
	}

	/**
	 * @param News $new
	 * @return $this
	 */
	public function addNew(News $new)
	{
		if (!$this->news->contains($new)) {
			$this->news[] = $new;
			$new->setUser($this);
		}
		return $this;
	}

	/**
	 * @param News $new
	 * @return $this
	 */
	public function removeNew(News $new)
	{
		if ($this->news->contains($new)) {
			$this->news->removeElement($new);
		}
		return $this;
	}

	/**
	 * @return Page[]|ArrayCollection
	 */
	public function getPages()
	{
		return $this->pages;
	}

	/**
	 * @param Page $page
	 * @return $this
	 */
	public function addPage(Page $page)
	{
		if (!$this->pages->contains($page)) {
			$this->pages[] = $page;
			$page->setUser($this);
		}
		return $this;
	}

	/**
	 * @param Page $page
	 * @return $this
	 */
	public function removePage(Page $page)
	{
		if ($this->pages->contains($page)) {
			$this->pages->removeElement($page);
		}
		return $this;
	}

	/**
	 * @return string
	 */
	public function getNom(): string
	{
		return $this->nom;
	}

	/**
	 * @param string $nom
	 * @return User
	 */
	public function setNom(string $nom)
	{
		$this->nom = $nom;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getEcompte(): float
	{
		return $this->ecompte;
	}

	/**
	 * @param float $ecompte
	 * @return User
	 */
	public function setEcompte(float $ecompte)
	{
		$this->ecompte = $ecompte;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMlc(): string
	{
		return $this->mlc;
	}

	/**
	 * @param string $mlc
	 * @return User
	 */
	public function setMlc(string $mlc)
	{
		$this->mlc = $mlc;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPrenom(): string
	{
		return $this->prenom;
	}

	/**
	 * @param string $prenom
	 * @return User
	 */
	public function setPrenom(string $prenom)
	{
		$this->prenom = $prenom;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMobile(): string
	{
		return $this->mobile;
	}

	/**
	 * @param string $mobile
	 * @return User
	 */
	public function setMobile(string $mobile)
	{
		$this->mobile = $mobile;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTel(): string
	{
		return $this->tel;
	}

	/**
	 * @param string $tel
	 * @return User
	 */
	public function setTel(string $tel)
	{
		$this->tel = $tel;
		return $this;
	}

	public function addGroup(GroupInterface $group)
	{
		if (!$this->getGroups()->contains($group)) {
			$this->getGroups()->add($group);
			$group->addUser($this);
		}

		return $this;
	}

	public function removeGroup(GroupInterface $group)
	{
		if ($this->getGroups()->contains($group)) {
			$this->getGroups()->removeElement($group);
			$group->removeUser($this);
		}

		return $this;
	}


}
