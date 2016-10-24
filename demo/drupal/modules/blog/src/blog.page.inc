<?php

/**
 * @file
 * Contains blog.page.inc.
 *
 * Page callback for Blog entities.
 */

use Drupal\Core\Render\Element;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Prepares variables for Blog templates.
 *
 * Default template: blog.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_blog(array &$variables) {
  // Fetch BlogEntity Entity Object.
  $blog = $variables['elements']['#blog'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
