<?php

namespace Drupal\swat\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Defines CountNameConstraintValidator class.
 */
class CountNameConstraintValidator extends ConstraintValidator {

  /**
   * Validate function for name field.
   */
  public function validate($value, Constraint $constraint) {
    /** @var \Drupal\Core\Field\FieldItemListInterface $value */
    /** @var \Drupal\swat\Plugin\Validation\Constraint\CountNameConstraint $constraint */
    /** @var \Drupal\Core\Entity\Plugin\DataType\EntityAdapter $adapter */
    /** @var \Drupal\swat\Entity\Swat $event */
    $name = \Drupal::request()->request->get('name')[0]['value'];
    if (strlen($name) < 2 || !preg_match('/^[A-Za-z]*$/', $name)) {
      $this->context->buildViolation($constraint->message)
        ->addViolation();
    }
  }

}
