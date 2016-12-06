<?php
/**
 * Created by PhpStorm.
 * User: mschultz
 * Date: 12/5/16
 * Time: 4:43 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="places",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="places_name_unique", columns={"name"})}
 * )
 */
class Place
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $address;

    /**
     * @ORM\OneToMany(targetEntity="Price", mappedBy="place")
     * @var Price[]
     */
    protected $prices;

    /**
     * @ORM\OneToMany(targetEntity="Theme", mappedBy="place")
     * @var Theme[]
     */
    protected $themes;

    public function __construct()
    {
        $this->prices = new ArrayCollection();
        $this->themes = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Price[]
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @param Price[] $prices
     * @return Place
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;
        return $this;
    }

    /**
     * @return Theme[]
     */
    public function getThemes()
    {
        return $this->themes;
    }

    /**
     * @param Theme[] $themes
     * @return Place
     */
    public function setThemes($themes)
    {
        $this->themes = $themes;
        return $this;
    }
}