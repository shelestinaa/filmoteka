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
     * @var string
     * @ORM\Column(name="year", type="string", nullable=false)
     */
    protected $year;


    /**
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


}