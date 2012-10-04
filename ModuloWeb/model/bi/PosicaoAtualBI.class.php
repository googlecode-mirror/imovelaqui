<?php

include_once dirname(__DIR__) . '/bi/GenericBI.class.php';
include_once dirname(__DIR__) . '/dao/PosicaoAtualDAO.class.php';

/**
 * This class is business logic for fetch properties by actual position of the
 * device.
 *
 * @author daniel
 */
class PosicaoAtualBI extends GenericBI {

  private $dom;
  private $parentNode;

  function __construct($connection) {
    parent::__construct($connection);
  }

  /**
   * The role of this method is transform the data found in search, performed in
   * class posicaoAtualDAO, in an string response formated as XML file.
   * 
   * @return String of the XML format or NULL.
   * @param type $lat
   * @param type $long
   * @param type $distance 
   */
  public function createXMLResponse($lat, $long, $distance) {
    $this->dom = new DOMDocument('1.0','UTF-8');

    $node = $this->dom->createElement("imoveis");
    $this->parentNode = $this->dom->appendChild($node);

    $posicaoAtualDAO = new PosicaoAtualDAO($this->connection);

    $rows = $posicaoAtualDAO->findByCordinatesAndDistance($lat, $long, $distance);

    if ($rows != NULL) {
      
      foreach ($rows as $row) {
        //Append childs found in the search.
        $node = $this->dom->createElement("imovel");
        $newNode = $this->parentNode->appendChild($node);
        $newNode->setAttribute("Tipo_Imovel", utf8_encode($row['imovel_tipo']));
        $newNode->setAttribute("Contrato", utf8_encode($row['contrato_tipo']));
        $newNode->setAttribute("Bairro", utf8_encode($row['bairro']));
        $newNode->setAttribute("Endereco", utf8_encode($row['endereco']));
        $newNode->setAttribute("Numero", utf8_encode($row['numero']));
      }
      //Return an string containing a XML file, with found data in search.
      return $this->dom->saveXML();
    } else {
      return NULL;
    }
  }
  
  /**
   * The role this method is transform the data found in search, performed in
   * class PosicaoAtualDAO, in string response formated as JSON file.
   * 
   * @param type $lat
   * @param type $long
   * @param type $distance
   * @return String of the JSON format or NULL 
   */
  public function createJSONResponse($lat, $long, $distance){
    $posicaoAtualDAO = new PosicaoAtualDAO($this->connection);
    
    $rows = $posicaoAtualDAO->findByCordinatesAndDistance($lat, $long, $distance);
    
    if(!is_null($rows)){
      return json_encode($this->arrayToUtf8($rows));
    } else {
      return NULL;
    }
  }
  
  public function arrayToUtf8($array){

    $i = 1;
    foreach ($array as $row){
        $temp[$i]['imovel_tipo'] = utf8_encode($row['imovel_tipo']);
        $temp[$i]['contrato_tipo'] = utf8_encode($row['contrato_tipo']);
        $temp[$i]['bairro'] = utf8_encode($row['bairro']);
        $temp[$i]['endereco'] = utf8_encode($row['endereco']);
        $temp[$i]['numero'] = utf8_encode($row['numero']);   
        $i++;
    }
    return $temp;
  }
}

?>