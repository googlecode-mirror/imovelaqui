<?php

include_once dirname(__DIR__) . '/bi/GenericBI.class.php';
include_once dirname(__DIR__) . '/dao/LocEspecificaDAO.class.php';
include_once dirname(__DIR__) . '/../util/ArrayHandler.class.php';

/**
 * This class is a business logic for fetch properties by especific location.
 *
 * @author daniel
 */
class LocEspecificaBI extends GenericBI {

  public function __construct($connection) {
    parent::__construct($connection);
  }

  public function getJsonResponse($cidade, $bairro, $rua) {
    $locEspecifica = new LocEspecificaDAO($this->connection);

    if ((!empty($cidade) ) && (!empty($bairro) ) && (!empty($rua) )) {

      $rows = $locEspecifica->findByLocEspecifica($cidade, $bairro, $rua);

      if (!is_null($rows) && !empty($rows)) {
        return json_encode(ArrayHandler::arrayToUtf8($rows));
      } else {
        return NULL;
      }
      
    } elseif ((!empty($cidade) ) && (!empty($bairro) ) && ( empty($rua) )) {
      
      $rows = $locEspecifica->findByCityAndNeighborhood($cidade, $bairro);

      if (!is_null($rows)) {
        return json_encode(ArrayHandler::arrayToUtf8($rows));
      } else {
        return "NULL Response";
      }
      
    } elseif ((!empty($cidade) ) && (empty($bairro) ) && ( empty($rua) )) {
      
      $rows = $locEspecifica->findByCity($cidade);

      if (!is_null($rows) && !empty($rows)) {
        return json_encode(ArrayHandler::arrayToUtf8($rows));
      } else {
        return NULL;
      }
      
    } else {
      return NULL;
    }
  }

}

?>
