<?php
// src/AppBundle/Entity/Suivi.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="suivi")
 */
class Suivi
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
     * @ORM\Column(name="prospect", type="string", length=255)
     */
    private $prospect;

    /**
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;

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
     * @return Suivi
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
     * @return Suivi
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProspect()
    {
        return $this->prospect;
    }

    /**
     * @param mixed $prospect
     * @return Suivi
     */
    public function setProspect($prospect)
    {
        $this->prospect = $prospect;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     * @return Suivi
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     * @return Suivi
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
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
     * @return Suivi
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }


}