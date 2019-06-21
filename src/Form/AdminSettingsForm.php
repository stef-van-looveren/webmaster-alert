<?php

namespace Drupal\webmaster_alert\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class AdminSettingsForm.
 *
 * @package Drupal\webmaster_alert\Form
 */
class AdminSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'webmaster_alert_admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'webmaster_alert.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('webmaster_alert.settings');

    $form['settings'] = [
      '#tree' => TRUE,
      '#type' => 'fieldset',
      '#title' => $this->t('Notification settings'),
    ];

    $form['settings']['email'] = [
      '#type' => 'email',
      '#title' => 'E-mailadres',
      '#description' => $this->t('This e-mail address will receive notifications.'),
      '#default_value' => $config->get('email'),
      '#required' => true
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('webmaster_alert.settings');
    $settings = $form_state->getValue('settings');
    $config->set('email', $settings['email']);
    $config->save();
    parent::submitForm($form, $form_state);
  }

}
