<?php

namespace Drupal\blog\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Blog entities.
 *
 * @ingroup blog
 */
interface BlogEntityInterface extends  ContentEntityInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Blog name.
   *
   * @return string
   *   Name of the Blog.
   */
  public function getName();

  /**
   * Sets the Blog name.
   *
   * @param string $name
   *   The Blog name.
   *
   * @return \Drupal\blog\Entity\BlogEntityInterface
   *   The called Blog entity.
   */
  public function setName($name);

  /**
   * Gets the Blog body.
   *
   * @return string
   *   Body of the Blog.
   */
  public function getBody();

  /**
   * Sets the Blog body.
   *
   * @param string $body
   *   The Blog body.
   *
   * @return \Drupal\blog\Entity\BlogEntityInterface
   *   The called Blog entity.
   */
  public function setBody($body);

}
