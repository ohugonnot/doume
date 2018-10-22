<?php
// src/AppBundle/Entity/Cotisation.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cotisation")
 */
class Cotisation
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="type", type="string", length=12)
     */
    private $type;

    /**
     * @ORM\Column(name="annee", type="integer", length=4)
     */
    private $annee;

    /**
     * @ORM\Column(name="debut", type="date")
     */
    private $debut;

    /**
     * @ORM\Column(name="fin", type="date")
     */
    private $fin;

    /**
     * @ORM\Column(name="montant", type="decimal", precision=6, scale=2)
     */
    private $montant;

    /**
     * @ORM\Column(name="moyen", type="string", length=20)
     */
    private $moyen;

    /**
     * @ORM\Column(name="recu", type="boolean", nullable=false)
     */
    private $recu;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="cotisation")
     */
    private $user;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Cotisation
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * @param mixed $annee
     * @return Cotisation
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * @param mixed $debut
     * @return Cotisation
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * @param mixed $fin
     * @return Cotisation
     */
    public function setFin($fin)
    {
        $this->fin = $fin;
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
     * @return Cotisation
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMoyen()
    {
        return $this->moyen;
    }

    /**
     * @param mixed $moyen
     * @return Cotisation
     */
    public function setMoyen($moyen)
    {
        $this->moyen = $moyen;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecu()
    {
        return $this->recu;
    }

    /**
     * @param mixed $recu
     * @return Cotisation
     */
    public function setRecu($recu)
    {
        $this->recu = $recu;
        return $this;
    }


}