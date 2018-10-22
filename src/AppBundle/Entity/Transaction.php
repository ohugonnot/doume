<?php
// src/AppBundle/Entity/Transaction.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="transaction")
 */
class Transaction
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @ORM\Column(name="type", type="string", length=3)
     */
    private $type;

    /**
     * @ORM\Column(name="expediteur", type="string", length=100)
     */
    private $expediteur;

    /**
     * @ORM\Column(name="destinataire", type="string", length=100)
     */
    private $destinataire;

    /**
     * @ORM\Column(name="montant", type="decimal", precision=7, scale=2)
     */
    private $montant;

    /**
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;


    /**
     * ManyToMany  une Transaction a plusieurs (2) User et/ou Prestataire & un User / Prestataire a plusieurs Transaction
     *
     */


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return Transaction
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     * @return Transaction
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Transaction
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * @param mixed $expediteur
     * @return Transaction
     */
    public function setExpediteur($expediteur)
    {
        $this->expediteur = $expediteur;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * @param mixed $destinataire
     * @return Transaction
     */
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     * @return Transaction
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     * @return Transaction
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }


}