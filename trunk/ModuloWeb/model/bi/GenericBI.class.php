<?php

include_once dirname(__DIR__) . '/dao/ConnectionFactory.class.php';

/**
 * Description of GenericBI
 *
 * @author daniel
 */
abstract class GenericBI {

  protected $connection;
  
  function __construct($connection) {
    $this->connection = $connection;
  }

    public function createConnectionWithTransaction($startTransaction) {
    return ConnectionFactory::getInstance()->createConnection($startTransaction);
  }

  public function releaseConnection($connection) {
    ConnectionFactory::getInstance()->releaseConnection($connection);
  }
  
}

?>
