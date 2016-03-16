<?php

namespace TodoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="tasks")
 */

class Tasks
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $libelle;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $description;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $datecre;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $datemod;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateremind;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $deadline;
    /**
     * @ORM\Column(type="integer")
     */
    protected $statut;

    /**
 * @ORM\ManyToOne(targetEntity="Category", inversedBy="tasks")
 */
    protected $category;

    /**
     * @ORM\ManyToMany(targetEntity="Tags", inversedBy="tasks")
     */
    protected $tag;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tasks")
     */
    protected $user;

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
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
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDatecre()
    {
        return $this->datecre;
    }

    /**
     * @param mixed $datecre
     */
    public function setDatecre($datecre)
    {
        $this->datecre = $datecre;
    }

    /**
     * @return mixed
     */
    public function getDatemod()
    {
        return $this->datemod;
    }

    /**
     * @param mixed $datemod
     */
    public function setDatemod($datemod)
    {
        $this->datemod = $datemod;
    }

    /**
     * @return mixed
     */
    public function getDateremind()
    {
        return $this->dateremind;
    }

    /**
     * @param mixed $dateremind
     */
    public function setDateremind($dateremind)
    {
        $this->dateremind = $dateremind;
    }

    /**
     * @return mixed
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param mixed $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

//    protected $tags;

  //  protected $user;



}
