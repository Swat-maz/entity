<?php

namespace Drupal\swat\Controller;

use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Drupal\file\Entity\File;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Ajax\AjaxResponse;

/**
 * Defines ResponseController class.
 *
 * @method getForm($entity, string $string)
 */
class SwatController extends ControllerBase {

  /**
   * Do some func.
   *
   * @var \Drupal\swat\Controller\SwatController
   */
  protected $formBuild;

  /**
   * Do some func.
   *
   * @var \Drupal\swat\Controller\SwatController
   */
  protected $entityBuild;

  /**
   * Creating a container for form rendering.
   */
  public static function create(ContainerInterface $container): SwatController {
    $instance              = parent::create($container);
    $instance->formBuild   = $container->get('entity.form_builder');
    $instance->entityBuild = $container->get('entity_type.manager');
    return $instance;
  }

  /**
   * Getting the Form and render it.
   */
  public function build() {
    $entity = $this->entityBuild
      ->getStorage('swat')
      ->create([
        'entity_type' => 'node',
        'entity'      => 'swat',
      ]);
    return $this->formBuild->getForm($entity, 'add');
  }

  /**
   * Show information from database.
   */
  public function show(): array {
    $form = $this->build();
    $constn = Database::getConnection();
    $query = $constn->select('swat', 's');
    $query->fields('s', [
      'id',
      'name',
      'email',
      'date',
      'photo__target_id',
      'avatar__target_id',
      'tel',
      'feedback',
    ]);
    $query->orderBy('s.date', 'DESC');
    $data = $query->execute()->fetchAllAssoc('id');
    $result = [];
    $data = json_decode(json_encode($data), TRUE);
    foreach ($data as $value) {
      $time = date('F/d/Y G:i:s', $value['date']);
      if ($value['avatar__target_id'] !== NULL) {
        $avatarphoto = File::load($value['avatar__target_id']);
        $ava = $avatarphoto->getFileUri();
      }
      else {
        $ava = 'public://default/default.jpeg';
      }
      if ($value['photo__target_id'] !== NULL) {
        $feedbackphoto = File::load($value['photo__target_id']);
        $feedfoto = $feedbackphoto->getFileUri();
      }
      else {
        $feedfoto = '';
      }
      $avatarka = [
        '#type' => 'image',
        '#theme' => 'image_style',
        '#style_name' => 'medium',
        '#uri' => $ava,
      ];
      $userphoto = [
        '#type' => 'image',
        '#theme' => 'image_style',
        '#style_name' => 'medium',
        '#uri' => $feedfoto,
      ];
      $result[] = [
        "swat" => $value['id'],
        "name" => $value['name'],
        "email" => $value['email'],
        "feedback" => $value['feedback'],
        "photo" => $userphoto,
        "ava" => $avatarka,
        "time" => $time,
        "phone" => $value['tel'],
        "uri" => file_url_transform_relative(file_create_url($feedfoto)),
      ];
    }
    return [
      '#form' => $form,
      '#theme' => 'swat',
      '#items' => $result,
    ];
  }

  /**
   * Ajax callback for name field.
   */
  public function nameAjaxCallback(): AjaxResponse {
    $response = new AjaxResponse();
    $name = \Drupal::request()->request->get('name')[0]['value'];
    $selector = '#edit-name-0-value';
    $cssError = ['border-color' => 'red'];
    $cssSuccess = ['border-color' => 'green'];
    if (strlen($name) < 2 || !preg_match('/^[A-Za-z]*$/', $name)) {
      $response->addCommand(new CssCommand($selector, $cssError));
    }
    else {
      $response->addCommand(new CssCommand($selector, $cssSuccess));
    }
    return $response;
  }

  /**
   * Ajax callback for telephone field.
   */
  public function telAjaxCallback(): AjaxResponse {
    $response = new AjaxResponse();
    $tel = \Drupal::request()->request->get('tel')[0]['value'];
    $selector = '#edit-tel-0-value';
    $cssError = ['border-color' => 'red'];
    $cssSuccess = ['border-color' => 'green'];
    if (!preg_match('/[0-9]{12}/', $tel)) {
      $response->addCommand(new CssCommand($selector, $cssError));
    }
    else {
      $response->addCommand(new CssCommand($selector, $cssSuccess));
    }
    return $response;
  }

  /**
   * Ajax callback for email field.
   */
  public function emailAjaxCallback(): AjaxResponse {
    $response = new AjaxResponse();
    $tel = \Drupal::request()->request->get('email')[0]['value'];
    $selector = '#edit-email-0-value';
    $cssError = ['border-color' => 'red'];
    $cssSuccess = ['border-color' => 'green'];
    if (!filter_var($tel, FILTER_VALIDATE_EMAIL)) {
      $response->addCommand(new CssCommand($selector, $cssError));
    }
    else {
      $response->addCommand(new CssCommand($selector, $cssSuccess));
    }
    return $response;
  }

  /**
   * Ajax callback for feedback field.
   */
  public function feedbackAjaxCallback(): AjaxResponse {
    $response = new AjaxResponse();
    $tel = \Drupal::request()->request->get('feedback')[0]['value'];
    $selector = '#edit-feedback-0-value';
    $cssError = ['border-color' => 'red'];
    $cssSuccess = ['border-color' => 'green'];
    if (strlen($tel) < 2) {
      $response->addCommand(new CssCommand($selector, $cssError));
    }
    else {
      $response->addCommand(new CssCommand($selector, $cssSuccess));
    }
    return $response;
  }

}
