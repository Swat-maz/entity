<?php

namespace Drupal\swat\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Defines SwatTelephoneConstraint class.
 *
 * @Constraint(
 *   id = "SwatTelephone",
 *   label = @Translation("Unique attendees"),
 * )
 */
class SwatTelephoneConstraint extends Constraint {

  /**
   * Error message for telephone field.
   *
   * @var string
   */
  public $message = 'Enter valid telephone (fill in the entire field only number).';

}
