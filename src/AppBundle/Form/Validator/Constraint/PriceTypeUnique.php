<?php

/**
 * Created by PhpStorm.
 * User: mschultz
 * Date: 12/8/16
 * Time: 2:03 PM
 */

namespace AppBundle\Form\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class PriceTypeUnique extends Constraint
{
    public $message = 'A place cannot contain prices with same type';
}