<?php
/**
 * Created by PhpStorm.
 * User: mschultz
 * Date: 12/6/16
 * Time: 5:53 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="themes",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="themes_name_place_unique", columns={"name", "place_id"})}
 * )
 */
class Theme
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
     * @ORM\Column(type="float")
     */
    protected $value;

    /**
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="themes")
     * @var Place
     */
    protected $place;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Theme
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Theme
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return Theme
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return Place
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param Place $place
     * @return Theme
     */
    public function setPlace($place)
    {
        $this->place = $place;
        return $this;
    }
}