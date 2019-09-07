<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('sortFilms', [$this, 'sortFilms']),
        ];
    }

    public function sortFilms($films)
    {
        $films = $films->toArray();

        usort($films, function ($a, $b) {
            return strcmp($a->getTitle(), $b->getTitle());
        });

        return $films;
    }
}