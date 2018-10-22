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


}
