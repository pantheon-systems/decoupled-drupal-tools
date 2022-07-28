<?php

namespace Drupal\pantheon_decoupled\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;

/**
 * Provides LinkProvider plugin definitions for custom configurable_language.
 */
class LanguageLinkProviderDeriver extends DeriverBase {

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $this->derivatives['languages'] = array_merge($base_plugin_definition, [
      'link_key' => "language--language",
      'link_relation_type' => 'language',
      'link_context' => [
        'top_level_object' => 'entrypoint',
      ],
    ]);
    return $this->derivatives;
  }

}