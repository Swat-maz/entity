<?php

namespace Drupal\swat\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Defines CountNameConstraint class.
 *
 * @Constraint(
 *   id = "CountName",
 *   label = @Translation("Validate Name"),
 * )
 */
class CountNameConstraint extends Constraint {

  /**
   * Error message for name field.
   *
   * @var string
   */
  public $message = 'Your name must be longer than one symbol and/or use only Latin letters.';

}
