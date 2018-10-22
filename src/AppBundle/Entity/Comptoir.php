<?php
// src/AppBundle/Entity/Comptoir.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="comptoir")
 */
class Comptoir
{

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(name="cpostal", type="integer", length=5)
     */
    private $cpostal;

    /**
     * @ORM\Column(name="ville", type="string", length=100)
     */
    private $ville;

    /**
     * @ORM\Column(name="tel", type="string", length=15)
     */
    private $tel;

    /**
     * @ORM\Column(name="mail", type="string", length=100)
     */
    private $mail;

    /**
     * @ORM\Column(name="fichier", type="string", length=100)
     */
    private $fichier;

    /**
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @ORM\Column(name="compte", type="integer", length=5)
     */
    private $compte;


    /**
     * @ORM\OneToOne(targetEntity="Geoloc", cascade={"persist"})
     */

    private $geoloc;

    public function getGeoloc()
    {
        return $this->geoloc;
    }

    public function setGeoloc(Geoloc $geoloc)
    {
        $this->geoloc = $geoloc;
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
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed enabled
     * @return Comptoir
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Comptoir
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     * @return Comptoir
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCpostal()
    {
        return $this->cpostal;
    }

    /**
     * @param mixed $cpostal
     * @return Comptoir
     */
    public function setCpostal($cpostal)
    {
        $this->cpostal = $cpostal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     * @return Comptoir
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     * @return Comptoir
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     * @return Comptoir
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
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
     * @return Comptoir
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * @param mixed $texte
     * @return Comptoir
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * @param mixed $compte
     * @return Comptoir
     */
    public function setCompte($compte)
    {
        $this->compte = $compte;
        return $this;
    }


}