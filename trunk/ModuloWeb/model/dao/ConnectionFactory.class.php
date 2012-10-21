<?php
/**
 * This is a singleton for get connections with database. This class is a
 * abstract class because nobody can instantiate a new classe.
 *
 * @author Daniel
 */
class ConnectionFactory {
  private static $instance;
  private $connection;
  
  //Private constructor, to prevent nobody will instantiate a new classe of
  //ConnectionFactory.
  private function __construct() { }

  //Get a new (or existing) instance of ConnectionFactory class.
  public static function getInstance(){
    if(!self::$instance){
      self::$instance = new ConnectionFactory();
    }
    return self::$instance;
  }
  
  //Create connection with database.
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
  
  //Close connection with database.
  public function releaseConnection($connection){
    //=== If connection is open, close connection.
    if($connection != NULL){
      $connection = NULL;
    }
  }
  
}

?>
