<?php

namespace Drupal\blog\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Blog entity.
 *
 * @ingroup blog
 *
 * @ContentEntityType(
 *   id = "blog",
 *   label = @Translation("Blog"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\blog\BlogEntityListBuilder",
 *     "views_data" = "Drupal\blog\Entity\BlogEntityViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\blog\Form\BlogEntityForm",
 *       "add" = "Drupal\blog\Form\BlogEntityForm",
 *       "edit" = "Drupal\blog\Form\BlogEntityForm",
 *       "delete" = "Drupal\blog\Form\BlogEntityDeleteForm",
 *     },
 *     "access" = "Drupal\blog\BlogEntityAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\blog\BlogEntityHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "blog",
 *   data_table = "blog_field_data",
 *   admin_permission = "administer blog entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "status" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/content/blog/{blog}",
 *     "add-form" = "/admin/content/blog/add",
 *     "edit-form" = "/admin/content/blog/{blog}/edit",
 *     "delete-form" = "/admin/content/blog/{blog}/delete",
 *     "collection" = "/admin/content/blog",
 *   },
 *   field_ui_base_route = "blog.settings"
 * )
 */
class BlogEntity extends ContentEntityBase implements BlogEntityInterface {

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
  */
  public function getOwnerId() {
    return 'Nope';
  }

  /**
   * {@inheritdoc}
   */
  public function setOwnerId($uid) {
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwner() {
    return 'Nope';
  }

  /**
   * {@inheritdoc}
   */
  public function setOwner(UserInterface $account) {
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isPublished() {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function setPublished($published) {
    // Nope.
  }

  /**
   * {@inheritdoc}
   */
  public function getBody() {
    return $this->get('body')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setBody($body) {
    $this->set('body', $body);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('The title of the Blog entity.'))
      ->setSettings(array(
        'max_length' => 50,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['body'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Body'))
      ->setDescription(t('The content of the Blog entity.'))
      ->setSettings(array(
        'max_length' => 50,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
