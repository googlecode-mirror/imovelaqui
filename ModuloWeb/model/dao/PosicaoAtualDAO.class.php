<?php
/**
 * Description of PosicaoAtual
 *
 * @author Daniel
 */
class PosicaoAtualDAO {

  private $connection;

  function __construct($connection) {
    $this->connection = $connection;
  }

  /**
   * The role of this method is searching in database the data filtered by
   * parameters below.
   * 
   * @param string $lat
   * @param string $long
   * @param float $distance
   * 
   * @return array $row
   */
  public function findByCordinatesAndDistance($lat, $long, $distance) {
    $sql = "SELECT
              `it`.`tipo` AS imovel_tipo,
              `tc`.`tipo` AS contrato_tipo,
              `i`.`bairro`,
              `i`.`endereco`,
              `i`.`numero`,
              ACOS( COS( RADIANS( `latitude` ) ) * COS( RADIANS( :latitude ) )
                * COS( RADIANS( `longitude` ) - RADIANS( :longitude ) )
                + SIN( RADIANS( `latitude` ) ) * SIN( RADIANS( :latitude )))
                * 6380 AS `distance`

          FROM
            imovel i
            LEFT JOIN (imovel_tipo it, tipo_contrato tc)
            ON(i.imovel_tipo = it.id AND i.tipo_contrato = tc.id)

          WHERE  ACOS( COS( RADIANS( `latitude` ) ) * COS( RADIANS( :latitude ) )
                 * COS( RADIANS( `longitude` ) - RADIANS( :longitude ) )
                 + SIN( RADIANS( `latitude` ) ) * SIN( RADIANS( :latitude )))
                 * 6380 < :distancia

          ORDER BY `distance`;";

    $stmt = $this->connection->prepare($sql);

    $params = array(':latitude' => $lat,
                    ':longitude' => $long,
                    ':distancia' => $distance);

    if ($stmt->execute($params)) {
      $rows = $stmt->fetchAll();
      return $rows;
    } else {
      return NULL;
    }
  }

}

?>