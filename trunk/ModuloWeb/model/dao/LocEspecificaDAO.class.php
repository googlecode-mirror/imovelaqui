<?php

/**
 * Description of LocEspecificaDAO
 *
 * @author daniel
 */
class LocEspecificaDAO {

  private $connection;

  function __construct($connection) {
    $this->connection = $connection;
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function findByLocEspecifica($cidade, $bairro, $rua) {
    try {
      $sql = "SELECT
              `it`.`tipo` AS imovel_tipo,
              `tc`.`tipo` AS contrato_tipo,
              `i`.`bairro`,
              `i`.`endereco`,
              `i`.`numero`
          FROM
            imovel i
              LEFT JOIN (imovel_tipo it, tipo_contrato tc, cidade c)
              ON(i.imovel_tipo = it.id AND i.tipo_contrato = tc.id AND c.id = i.cidade)
          WHERE
            UPPER(`c`.`nome`) = UPPER(:cidade)
            AND UPPER(`i`.`bairro`) = UPPER(:bairro) 
            AND UPPER(`i`.`endereco`) = UPPER(:rua)";

      $stmt = $this->connection->prepare($sql);

      $queryParams = array(':cidade' => $cidade,
          ':bairro' => $bairro,
          ':rua' => $rua);

      if ($stmt->execute($queryParams)) {
        $rows = $stmt->fetchAll();
        return $rows;
      } else {
        return NULL;
      }
    } catch (PDOException $exc) {

      echo $exc->getTraceAsString() . "<br /><br />";
      print_r($exc->getMessage());
      exit();
    }
  }

  public function findByCityAndNeighborhood($cidade, $bairro) {
    try {
      $sql = "SELECT
              `it`.`tipo` AS imovel_tipo,
              `tc`.`tipo` AS contrato_tipo,
              `i`.`bairro`,
              `i`.`endereco`,
              `i`.`numero`
          FROM
            imovel i
              LEFT JOIN (imovel_tipo it, tipo_contrato tc, cidade c)
              ON(i.imovel_tipo = it.id AND i.tipo_contrato = tc.id AND c.id = i.cidade)
          WHERE
            c.nome = :cidade AND i.bairro = :bairro";

      $stmt = $this->connection->prepare($sql);

      $queryParams = array(
          ':cidade' => $cidade,
          ':bairro' => $bairro
      );

      if ($stmt->execute($queryParams)) {
        $rows = $stmt->fetchAll();
        return $rows;
      } else {
        return NULL;
      }
    } catch (PDOException $exc) {
      echo $exc->getTraceAsString() . "<br /><br />";
      echo $exc->getMessage();
      exit();
    }
  }

  public function findByCity($cidade) {
    try {
      $sql = "SELECT
              `it`.`tipo` AS imovel_tipo,
              `tc`.`tipo` AS contrato_tipo,
              `i`.`bairro`,
              `i`.`endereco`,
              `i`.`numero`
          FROM
            imovel i
              LEFT JOIN (imovel_tipo it, tipo_contrato tc, cidade c)
              ON(i.imovel_tipo = it.id AND i.tipo_contrato = tc.id AND c.id = i.cidade)
          WHERE
            c.nome = :cidade;";


      $stmt = $this->connection->prepare($sql);

      if ($stmt->execute(array(':cidade' => $cidade))) {
        $rows = $stmt->fetchAll();
        return $rows;
      } else {
        return NULL;
      }
    } catch (PDOException $exc) {
      echo $exc->getTraceAsString() . "<br /><br />";
      echo $exc->getMessage();
      exit();
    }
  }

}

?>
