<?php

  namespace Drupal\my_custom_block\Plugin\Block;

  use Drupal\Core\Block\BlockBase;
  use Drupal\Core\Form\FormStateInterface;

  /**
  * Provides a 'My Custom Block' Block.
  *
  * @Block(
  * id = "my_custom_block",
  * admin_label = @Translation("My Custom Block"),
  * category = @Translation("Custom"),
  * )
  */
  class MyCustomBlock extends BlockBase {

    /**
    * {@inheritdoc}
    */
    public function defaultConfiguration() {
      return [
        'block_content' => '',
      ] + parent::defaultConfiguration();
    }

    /**
    * {@inheritdoc}
    */
    public function blockForm($form, FormStateInterface $form_state) {
      $form['block_content'] = [
        '#type' => 'textarea',
        '#title' => $this->t('Quotes content'),
        '#description' => $this->t('Type your quotes separatted by a comma'),
        '#default_value' => $this->configuration['block_content'],
      ];
      return $form;
    }

    /** function to validate the block form */
    public function blockValidate($form, FormStateInterface $form_state)
    {
      if (!$form_state->getValue('block_content')) 
        $form_state->setErrorByName('block_content', $this->t('quotes should not be empty !'));
      if (strlen($form_state->getValue('block_content')) < 20)
        $form_state->setErrorByName('block_content', $this->t('at least one quote should exists !'));
      return $form_state;
    }


    /**
    * {@inheritdoc}
    */
    public function blockSubmit($form, FormStateInterface $form_state) {
      $this->configuration['block_content'] = $form_state->getValue('block_content');
    }



    /**
    * {@inheritdoc}
    */
    public function build() {
      
      // Generate a random color.
      $color = '#' . substr(md5(mt_rand()), 0, 6);
      // Generate random quote from the data entred by the user
      // block_content contains the quotes separated by a comma
      $content = $this->extractRandomWord($this->configuration['block_content']);

      return [
        '#markup' => '<strong>' .$content . '</strong>',
        '#attributes' => [
          'style' => 'color :'. $color
        ],
        '#cache' => [
          'max-age' => 0,
        ],
      ];
    }

    private function extractRandomWord($data)
    {
      // split the string and store it into an array
      $words = explode(",", $data);
      // get the key of the random value from the array
      $rand_key = array_rand($words);
      // return the string using it key
      return $words[$rand_key];
    }
  }



