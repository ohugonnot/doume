<?php
// src/AppBundle/Entity/Lien.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="lien")
 */
class Lien
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    private $auteur;

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
     * @return Lien
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
     * @return Lien
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
     * @return Lien
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
     * @return Lien
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return Lien
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
     * @return Lien
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }


}