<?php
class Cidade {

  private $id;
  private $nome;
  private $idEstado;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getIdEstado() {
    return $this->idEstado;
  }

  public function setIdEstado($idEstado) {
    $this->idEstado = $idEstado;
  }

}
?>