<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Tag
 * @package App\Entity
 * @ORM\Table(name="tags")
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 */
class Tag
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;


    /**
     * @var null|string
     * @ORM\Column(name="title", type="string")
     */
    protected $title;


    /**
     * @ORM\ManyToMany(targetEntity="Film", mappedBy="tags")
     */
    protected $films;

    /**
     * Tag constructor.
     * @param $films
     */
    public function __construct()
    {
        $this->films = new ArrayCollection();
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
     * @return Tag
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     * @return Tag
     */
    public function setTitle(?string $title): Tag
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFilms()
    {
        return $this->films;
    }

    /**
     * @param mixed $films
     * @return Tag
     */
    public function setFilms($films)
    {
        $this->films = $films;
        return $this;
    }


}