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


}