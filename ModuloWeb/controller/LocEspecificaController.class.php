<?php
include_once dirname(__DIR__) . '/model/dao/ConnectionFactory.class.php';
include_once dirname(__DIR__) . '/model/bi/LocEspecificaBI.class.php';

/**
 * This class is a link of the boundary tier and de the model tier.
 *
 * @author daniel
 */
class LocEspecificaController {
  
  private $connection;
  
  public function getJsonResponse($cidade, $bairro, $rua){
    $this->connection = ConnectionFactory::getInstance()->createConnection(false);
    $locEspecificaBI = new LocEspecificaBI($this->connection);
    
    $jsonResponse = $locEspecificaBI->getJsonResponse($cidade, $bairro, $rua);
    $locEspecificaBI->releaseConnection($this->connection);

    return $jsonResponse;
    
  }
  
}

?>
