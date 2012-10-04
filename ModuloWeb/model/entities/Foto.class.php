<?php
class Foto {

  private $id;
  private $caminho;
  private $imovel;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getCaminho() {
    return $this->caminho;
  }

  public function setCaminho($caminho) {
    $this->caminho = $caminho;
  }

  public function getImovel() {
    return $this->imovel;
  }

  public function setImovel($imovel) {
    $this->imovel = $imovel;
  }

}

?>