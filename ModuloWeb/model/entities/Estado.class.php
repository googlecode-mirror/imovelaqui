<?php
class Estado {

  private $id;
  private $nome;
  private $uf;

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

  public function getUf() {
    return $this->uf;
  }

  public function setUf($uf) {
    $this->uf = $uf;
  }

}

?>