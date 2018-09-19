<?php

namespace AppBundle\Twig;

use AppBundle\Entity\Document;
use AppBundle\Entity\Essais;
use AppBundle\Entity\Visite;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {

        return array(
            new \Twig_SimpleFilter('values', array($this, 'values')),
        );
    }

    /**
     * @param $array
     * @return array
     */
    public function values(array $array): array
    {

        return array_values($array);
    }
}