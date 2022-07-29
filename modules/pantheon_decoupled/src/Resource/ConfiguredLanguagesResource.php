<?php

namespace Drupal\pantheon_decoupled\Resource;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\jsonapi\ResourceResponse;
use Drupal\jsonapi_resources\Resource\EntityQueryResourceBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Processes a request for configured languages.
 *
 * @internal
 */
class ConfiguredLanguagesResource extends EntityQueryResourceBase {

  /**
   * Process the resource request.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request.
   * @param array $resource_types
   *   An array of jsonapi ResourceType.
   *
   * @return \Drupal\jsonapi\ResourceResponse
   *   The response
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function process(Request $request, array $resource_types): ResourceResponse {
    /** @var \Drupal\jsonapi\ResourceType $resource_types */
    $resource_types = reset($resource_types);

    $query = $this->getEntityQuery($resource_types->getBundle())
      ->condition('locked', FALSE);
    $data = $this->loadResourceObjectDataFromEntityQuery($query, new CacheableMetadata());
    return $this->createJsonapiResponse($data, $request);
  }

}
