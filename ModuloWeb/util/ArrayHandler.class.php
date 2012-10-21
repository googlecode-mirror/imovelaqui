<?php

/**
 * This class is a handler for array types.
 *
 * @author daniel
 */
abstract class ArrayHandler {

  /**
   *  This method converts an array, builded in the search from database, to UTF-8.
   * @param array $array
   * @return type array
   */
  public static function arrayToUtf8($array) {

    $i = 1;
    foreach ($array as $row) {
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
