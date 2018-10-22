<?php
// src/AppBundle/Entity/Transfert.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="transfert")
 */
class Transfert
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
     * @ORM\Column(name="operateur", type="string", length=20)
     */
    private $operateur;

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
     * User comme opérateurs mais la reconversion implique un Prestataire (cas unique)
     * ManyToMany un Transfert a plusieurs User / Prestataire & un User / Prestataire a plusieurs Transfert
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
     * @return Transfert
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperateur()
    {
        return $this->operateur;
    }

    /**
     * @param mixed $operateur
     * @return Transfert
     */
    public function setOperateur($operateur)
    {
        $this->operateur = $operateur;
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
     * @return Transfert
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
     * @return Transfert
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
     * @return Transfert
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
     * @return Transfert
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
     * @return Transfert
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
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
     * @return Transfert
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }


}