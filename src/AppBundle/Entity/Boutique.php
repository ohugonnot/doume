<?php
// src/AppBundle/Entity/Boutique.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="boutique")
 */
class Boutique
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(name="created_at", type="date")
     */
    private $createdAt;

    /**
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @ORM\Column(name="categorie", type="string", length=20)
     */
    private $categorie;

    /**
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\Column(name="fichier", type="string", length=150)
     */
    private $fichier;

    /**
     * @ORM\Column(name="prix", type="decimal", precision=6, scale=2)
     */
    private $prix;


    /**
     * @ORM\ManyToOne(targetEntity="Prestataire", inversedBy="boutique")
     */
    private $user;

    /**
     * @param Prestataire $prestataire
     * @return $this
     */
    public function setPrestataire(Prestataire $prestataire)
    {
        $this->prestataire = $prestataire;
        return $this;
    }

    /**
     * @return Prestataire
     */
    public function getPrestataire()
    {
        return $this->prestataire;
    }


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
     * @return Boutique
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
     * @return Boutique
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     * @return Boutique
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
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
     * @return Boutique
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Boutique
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * @param mixed $fichier
     * @return Boutique
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     * @return Boutique
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }


}
