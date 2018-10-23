<?php
// src/AppBundle/Entity/Groupe.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\Group as BaseGroup;

/**
 * @ORM\Entity
 * @ORM\Table(name="groupe")
 */
class Groupe extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(name="compte", type="integer", length=5)
     */
    private $compte;


    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Groupe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
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
     * @return Groupe
     */
    public function setCompte($compte)
    {
        $this->compte = $compte;
        return $this;
    }


}