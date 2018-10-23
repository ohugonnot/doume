<?php
// src/AppBundle/Entity/Marche.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="marche")
 */
class Marche
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(name="adresse", type="string", length=250)
     */
    private $adresse;

    /**
     * @ORM\Column(name="contact", type="string", length=100)
     */
    private $contact;

    /**
     * @ORM\Column(name="tel", type="string", length=15)
     */
    private $tel;

    /**
     * @ORM\Column(name="mel", type="string", length=100)
     */
    private $mel;

    /**
     * @ORM\Column(name="jour", type="string", length=255)
     */
    private $jour;

    /**
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;


    /**
     * @ORM\OneToOne(targetEntity="Geoloc", cascade={"persist"})
     */

    private $geoloc;
    /**
     * @var ArrayCollection|Prestataire[]
     * @ORM\ManyToMany(targetEntity="Prestataire", inversedBy="marche", cascade={"persist"}, fetch="EXTRA_LAZY")
     */
    private $prestataires;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Marche
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
     * @return Marche
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $contact
     * @return Marche
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
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
     * @return Marche
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMel()
    {
        return $this->mel;
    }

    /**
     * @param mixed $mel
     * @return Marche
     */
    public function setMel($mel)
    {
        $this->mel = $mel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * @param mixed $jour
     * @return Marche
     */
    public function setJour($jour)
    {
        $this->jour = $jour;
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
     * @return Marche
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
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
            $prestataire->addMarche($this);
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
            $prestataire->removeMarche($this);
        }
        return $this;
    }

}