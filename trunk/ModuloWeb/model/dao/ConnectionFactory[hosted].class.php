<?php
/**
 * Description of ConnectionFactory
 *
 * @author Daniel
 */
class ConnectionFactory {
  private static $instance;
  private $connection;
  
  public static function getInstance(){
    if(!self::$instance){
      self::$instance = new ConnectionFactory();
    }
    return self::$instance;
  }
  
  public function createConnection($startTransaction){
    $dsn = "mysql:dbname=542341_test1;host=fdb3.awardspace.com";
    $userName = "542341_test1";
    $password = "7a29b0da";
    
    $this->connection = new PDO($dsn, $userName, $password);
    //=== If $startTransaction == true, turn off autocommit.
    if($startTransaction){
      $this->connection->beginTransaction();
    }
    return $this->connection;
  }
  public function releaseConnection($connection){
    //=== If connection is open, close connection.
    if($connection != NULL){
      $connection = NULL;
    }
  }
  
}

?>
