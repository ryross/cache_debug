<?php

namespace Drupal\cache_debug\Cache;

use Drupal\Core\Cache\CacheFactoryInterface;
use Drupal\Core\Cache\CacheTagsChecksumInterface;
use Drupal\Core\Cache\DatabaseBackend;
use Drupal\Core\Database\Connection;
use Drupal\Core\Site\Settings;
use Drupal\Core\Cache\DatabaseBackendFactory;

class DebugBackendFactory extends DatabaseBackendFactory {

  public function __construct(Connection $connection, CacheTagsChecksumInterface $checksum_provider, Settings $settings = NULL) {
    parent::__construct($connection, $checksum_provider, $settings);
  }
  /**
   * {@inheritdoc}
   */
  public function get($bin) {
      $max_rows = $this->getMaxRowsForBin($bin);
      return new DebugBackend($this->connection, $this->checksumProvider, $bin, $max_rows);
  }

}
