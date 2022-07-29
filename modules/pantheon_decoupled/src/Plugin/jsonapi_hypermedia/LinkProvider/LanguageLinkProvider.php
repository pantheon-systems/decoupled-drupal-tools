<?php

namespace Drupal\pantheon_decoupled\Plugin\jsonapi_hypermedia\LinkProvider;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Url;
use Drupal\jsonapi\JsonApiResource\JsonApiDocumentTopLevel;
use Drupal\jsonapi_hypermedia\AccessRestrictedLink;
use Drupal\jsonapi_hypermedia\Plugin\LinkProviderBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a JSON:API Configurable Language LinkProvider.
 *
 * @JsonapiHypermediaLinkProvider(
 *   id = "pantheon_decoupled.language",
 *   deriver = "Drupal\pantheon_decoupled\Plugin\Derivative\LanguageLinkProviderDeriver",
 *   link_relation_type = "language",
 * )
 */
final class LanguageLinkProvider extends LinkProviderBase implements ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public function getLink($context) {
    assert($context instanceof JsonApiDocumentTopLevel);
    return AccessRestrictedLink::createLink(
      AccessResult::allowed(),
      new CacheableMetadata(),
      new Url('pantheon_decoupled.configured_languages_resource'),
      $this->getLinkRelationType()
    );
  }

}
