<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Film
 * @package App\Entity
 * @ORM\Table(name="films")
 * @ORM\Entity (repositoryClass="App\Repository\FilmRepository")
 */
class Film
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", nullable=false)
     */
    protected $title;

    /**
     * @var int
     * @ORM\Column(name="year", type="integer", nullable=false, length=4)
     */
    protected $year;


    /**
     * @var null|ArrayCollection
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="films")
     * @ORM\JoinTable(name="films_tags")
     */
    protected $tags;

    /**
     * Film constructor.
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
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
     * @return Film
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
     * @param string $title
     * @return Film
     */
    public function setTitle(string $title): Film
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return null|int
     */
    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return Film
     */
    public function setYear(int $year): Film
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    public function getListTags()
    {
        return implode(',', $this->getTags());
    }

    /**
     * @param mixed $tags
     * @return Film
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }


}