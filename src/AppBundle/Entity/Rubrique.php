<?php
// src/AppBundle/Entity/Rubrique.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="rubrique")
 */
class Rubrique
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="nom", type="string", length=20)
     */
    private $nom;
    /**
     * @var ArrayCollection|Prestataire[]
     * @ORM\ManyToMany(targetEntity="Prestataire", inversedBy="rubrique", cascade={"persist"}, fetch="EXTRA_LAZY")
     */
    private $prestataires;

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
     * @return Rubrique
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
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
            $prestataire->addRubrique($this);
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
            $prestataire->removeRubrique($this);
        }
        return $this;
    }


}