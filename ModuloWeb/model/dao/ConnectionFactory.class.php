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
    $dsn = "mysql:dbname=imovelaqui;host=localhost";
    $userName = "root";
    $password = "hcc152";
    
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
