<?php

namespace Drupal\swat\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Defines SwatTelephoneConstraintValidator class.
 */
class SwatTelephoneConstraintValidator extends ConstraintValidator {

  /**
   * Validate function for telephone field.
   */
  public function validate($value, Constraint $constraint) {
    /** @var \Drupal\Core\Field\FieldItemListInterface $value */
    /** @var \Drupal\swat\Plugin\Validation\Constraint\SwatTelephoneConstraint $constraint */
    $tel = \Drupal::request()->request->get('tel')[0]['value'];
    if (!preg_match('/[0-9]{12}/', $tel)) {
      $this->context->buildViolation($constraint->message)
        ->addViolation();
    }
  }

}
