<?php

namespace Drupal\blog\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Blog entities.
 */
class BlogEntityViewsData extends EntityViewsData implements EntityViewsDataInterface {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['blog']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Blog'),
      'help' => $this->t('The Blog ID.'),
    );

    return $data;
  }

}
