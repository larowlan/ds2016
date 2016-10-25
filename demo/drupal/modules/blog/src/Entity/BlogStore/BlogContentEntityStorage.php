<?php

namespace Drupal\blog\Entity\BlogStore;

use Drupal\Core\Language\LanguageInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Drupal\Core\KeyValueStore\StorageBase;
use Drupal\Component\Serialization\SerializationInterface;
use Drupal\Core\Database\Query\Merge;
use Drupal\Core\Database\Connection;
use Drupal\Core\DependencyInjection\DependencySerializationTrait;

/**
 * Defines a default key/value store implementation.
 *
 * This is Drupal's default key/value store implementation. It uses the database
 * to store key/value data.
 */
class BlogContentEntityStorage extends StorageBase {

  use DependencySerializationTrait;

  /**
   * The http client.
   *
   * @var \GuzzleHttp\Client
   */
  protected $client;

  /**
   * A quick and dirty list of blogs (in memory).
   *
   * @var array
   */
  protected $blogs;

  /**
   * Overrides Drupal\Core\KeyValueStore\StorageBase::__construct().
   *
   * @param string $collection
   *   The name of the collection holding key and value pairs.
   * @param \Drupal\Component\Serialization\SerializationInterface $serializer
   *   The serialization class to use.
   * @param \Drupal\Core\Database\Connection $connection
   *   The database connection to use.
   * @param string $table
   *   The name of the SQL table to use, defaults to key_value.
   */
  public function __construct($collection, \GuzzleHttp\Client $client) {
    parent::__construct($collection);
    $this->client = $client;
  }

  /**
   * {@inheritdoc}
   */
  public function has($key) {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getMultiple(array $keys) {
    $result = $this->getAll();

    $values = array();

    foreach ($keys as $key) {
      if (isset($result[$key])) {
        $values[$key] = $result[$key];
      }
    }

    /*try {
      $result = $this->connection->query('SELECT name, value FROM {' . $this->connection->escapeTable($this->table) . '} WHERE name IN ( :keys[] ) AND collection = :collection', array(':keys[]' => $keys, ':collection' => $this->collection))->fetchAllAssoc('name');
      foreach ($keys as $key) {
        if (isset($result[$key])) {
          $values[$key] = $this->serializer->decode($result[$key]->value);
        }
      }
    }
    catch (\Exception $e) {
      // @todo: Perhaps if the database is never going to be available,
      // key/value requests should return FALSE in order to allow exception
      // handling to occur but for now, keep it an array, always.
    }*/
    return $values;
  }

  /**
   * {@inheritdoc}
   */
  public function getAll() {
    $blogs = array();

    $request = new Request('GET', 'http://172.18.0.2:8080/blogs');

    try {
      $response = $this->client->send($request);
      $blogs = json_decode($response->getBody(), TRUE);
      foreach ($blogs as $id => $blog) {
        foreach ($blog as $field => $value) {
          $blogs[$id][$field] = [LanguageInterface::LANGCODE_DEFAULT => $value];
        }
        $blogs[$id]['id'] = [LanguageInterface::LANGCODE_DEFAULT => $id];
      }
    }
    catch (RequestException $e) {
      // @todo: Perhaps if the database is never going to be available,
      // key/value requests should return FALSE in order to allow exception
      // handling to occur but for now, keep it an array, always.
    }

    return $blogs;
  }

  /**
   * {@inheritdoc}
   */
  public function set($key, $value) {
    /**
     * array (
     * 'id' =>
     * array (
     * 0 =>
     * array (
     * 'value' => '7JsMU5pwDrokKCtRW8kc',
     * ),
     * ),
     * 'uuid' =>
     * array (
     * ),
     * 'title' =>
     * array (
     * 0 =>
     * array (
     * 'value' => 'Test Blog 2',
     * ),
     * ),
     * 'body' =>
     * array (
     * 0 =>
     * array (
     * 'value' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
     * ),
     * ),
     * )
     */
    /*$this->connection->merge($this->table)
      ->keys(array(
        'name' => $key,
        'collection' => $this->collection,
      ))
      ->fields(array('value' => $this->serializer->encode($value)))
      ->execute();*/
  }

  /**
   * {@inheritdoc}
   */
  public function setIfNotExists($key, $value) {
    /*$result = $this->connection->merge($this->table)
      ->insertFields(array(
        'collection' => $this->collection,
        'name' => $key,
        'value' => $this->serializer->encode($value),
      ))
      ->condition('collection', $this->collection)
      ->condition('name', $key)
      ->execute();
    return $result == Merge::STATUS_INSERT;*/
  }

  /**
   * {@inheritdoc}
   */
  public function rename($key, $new_key) {
    /*$this->connection->update($this->table)
      ->fields(array('name' => $new_key))
      ->condition('collection', $this->collection)
      ->condition('name', $key)
      ->execute();*/
  }

  /**
   * {@inheritdoc}
   */
  public function deleteMultiple(array $keys) {
    // Delete in chunks when a large array is passed.
    /*while ($keys) {
      $this->connection->delete($this->table)
        ->condition('name', array_splice($keys, 0, 1000), 'IN')
        ->condition('collection', $this->collection)
        ->execute();
    }*/
  }

  /**
   * {@inheritdoc}
   */
  public function deleteAll() {
    /*$this->connection->delete($this->table)
      ->condition('collection', $this->collection)
      ->execute();*/
  }

}
