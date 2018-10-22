<?php
// src/AppBundle/Entity/News.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="news")
 */
class News
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @ORM\Column(name="fichier", type="string", length=255)
     */
    private $fichier;

    /**
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    private $auteur;

    /**
     * @ORM\Column(name="groupe", type="string", length=255)
     */
    private $groupe;

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
     * @return News
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
     * @return News
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
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
     * @return News
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
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
     * @return News
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
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
     * @return News
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     * @return News
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * @param mixed $groupe
     * @return News
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;
        return $this;
    }


}