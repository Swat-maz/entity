<?php

namespace Drupal\swat\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Defines SwatForm class.
 */
class SwatForm extends ContentEntityForm {

  /**
   * Made link after success form submit.
   */
  public function save(array $form, FormStateInterface $form_state) {
    parent::save($form, $form_state);

    $entity = $this->getEntity();
    $entity_type = $entity->getEntityType();

    $arguments = [
      '@entity_type' => $entity_type->getSingularLabel(),
      '%entity' => $entity->label(),
      'link' => $entity->toLink($this->t('View'), 'canonical')->toString(),
    ];

    $this->logger($entity->getEntityTypeId())->notice('The @entity_type %entity has been saved.', $arguments);
    $this->messenger()->addStatus($this->t('The @entity_type %entity has been saved.', $arguments));

    $form_state->setRedirectUrl(Url::fromRoute('response_form.content'));
  }

}
