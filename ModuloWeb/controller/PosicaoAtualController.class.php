<?php


include_once dirname(__DIR__) . '/model/dao/ConnectionFactory.class.php';
include_once dirname(__DIR__) . '/model/bi/PosicaoAtualBI.class.php';

/**
 * This class is a link of the boundary tier and model tier.
 *
 * @author daniel
 */
class PosicaoAtualController {

  private $connection;

  public function getXMLResponse($lat, $long, $distance) {
    $this->connection = ConnectionFactory::getInstance()->createConnection(false);
    $posicaoAtualBI = new PosicaoAtualBI($this->connection);

    $xmlResponse = $posicaoAtualBI->createXMLResponse($lat, $long, $distance);
    $posicaoAtualBI->releaseConnection($this->connection);

    return $xmlResponse;
  }
  
  public function getJSONResponse($lat, $long, $distance){
    $this->connection = ConnectionFactory::getInstance()->createConnection(false);
    $posicaoAtualBI = new PosicaoAtualBI($this->connection);
    
    $jsonResponse = $posicaoAtualBI->createJSONResponse($lat, $long, $distance);
    $posicaoAtualBI->releaseConnection($this->connection);
    
    return $jsonResponse;
  }

}

?>
