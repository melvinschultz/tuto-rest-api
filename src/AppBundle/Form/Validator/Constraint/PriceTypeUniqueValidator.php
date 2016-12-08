<?php
/**
 * Created by PhpStorm.
 * User: mschultz
 * Date: 12/8/16
 * Time: 2:07 PM
 */

namespace AppBundle\Form\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PriceTypeUniqueValidator extends ConstraintValidator
{
    public function validate($prices, Constraint $constraint)
    {
        if (!($prices instanceof \Doctrine\Common\Collections\ArrayCollection)) {
            return;
        }

        $pricesType = [];

        foreach ($prices as $price) {
            if (in_array($price->getType(), $pricesType)) {
                $this->context->buildViolation($constraint->message)
                    ->addViolation();
                return; // si il y a un doublon, on arrête la recherche
            } else {
                // sauvegarde des types de prix déjà présents
                $pricesType[] = $price->getType();
            }
        }
    }
}