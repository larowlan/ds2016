<?php

namespace Drupal\blog\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Blog entities.
 *
 * @ingroup blog
 */
interface BlogEntityInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Blog title.
   *
   * @return string
   *   Title of the Blog.
   */
  public function getTitle();

  /**
   * Sets the Blog title.
   *
   * @param string $title
   *   The Blog title.
   *
   * @return \Drupal\blog\Entity\BlogEntityInterface
   *   The called Blog entity.
   */
  public function setTitle($title);

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
