<?php
/**
 * Created by PhpStorm.
 * User: mschultz
 * Date: 12/5/16
 * Time: 4:43 PM
 */

namespace AppBundle\Entity;


class Place
{
    public $name;

    public $address;

    public function __construct($name, $address)
    {
        $this->name = $name;
        $this->address = $address;
    }
}