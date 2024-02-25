<?php

namespace Drupal\my_custom_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'My Custom Block' block.
 *
 * @Block(
 *   id = "my_custom_block",
 *   admin_label = @Translation("My Custom Block"),
 * )
 */
class MyCustomBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->t('Hello, World! This is my custom block.'),
    ];
  }
}


