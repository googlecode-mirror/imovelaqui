<?php
class Imobiliaria {

  private $id;
  private $idMatriz;
  private $nome;
  private $site;
  private $cep;
  private $bairro;
  private $endereco;
  private $numero;
  private $cidade;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getIdMatriz() {
    return $this->idMatriz;
  }

  public function setIdMatriz($idMatriz) {
    $this->idMatriz = $idMatriz;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getSite() {
    return $this->site;
  }

  public function setSite($site) {
    $this->site = $site;
  }

  public function getCep() {
    return $this->cep;
  }

  public function setCep($cep) {
    $this->cep = $cep;
  }

  public function getBairro() {
    return $this->bairro;
  }

  public function setBairro($bairro) {
    $this->bairro = $bairro;
  }

  public function getEndereco() {
    return $this->endereco;
  }

  public function setEndereco($endereco) {
    $this->endereco = $endereco;
  }

  public function getNumero() {
    return $this->numero;
  }

  public function setNumero($numero) {
    $this->numero = $numero;
  }

  public function getCidade() {
    return $this->cidade;
  }

  public function setCidade($cidade) {
    $this->cidade = $cidade;
  }

}

?>