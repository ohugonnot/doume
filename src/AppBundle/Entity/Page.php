<?php
// src/AppBundle/Entity/Page.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="page")
 */
class Page
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="url", type="string", length=30)
     */
    private $url;

    /**
     * @ORM\Column(name="js", type="string", length=255)
     */
    private $js;

    /**
     * @ORM\Column(name="css", type="string", length=255)
     */
    private $css;

    /**
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(name="tag", type="string", length=255)
     */
    private $tag;

    /**
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"}, inversedBy="pages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return Page
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
     * @return Page
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
     * @return Page
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     * @return Page
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
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
     * @return Page
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getJs()
    {
        return $this->js;
    }

    /**
     * @param mixed $js
     * @return Page
     */
    public function setJs($js)
    {
        $this->js = $js;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * @param mixed $css
     * @return Page
     */
    public function setCss($css)
    {
        $this->css = $css;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Page
     */
    public function setUser(User $user): Page
    {
        $this->user = $user;
        return $this;
    }


}