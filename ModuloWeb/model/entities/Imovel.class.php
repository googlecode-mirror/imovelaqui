<?php
class Imovel {

  private $id;
  private $cep;
  private $bairro;
  private $endereco;
  private $numero;
  private $metragem;
  private $latitude;
  private $longitude;
  private $imovelTipo;
  private $tipoContrato;
  private $cidade;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
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

  public function getMetragem() {
    return $this->metragem;
  }

  public function setMetragem($metragem) {
    $this->metragem = $metragem;
  }

  public function getLatitude() {
    return $this->latitude;
  }

  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }

  public function getLongitude() {
    return $this->longitude;
  }

  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }

  public function getImovelTipo() {
    return $this->imovelTipo;
  }

  public function setImovelTipo(ImovelTipo $imovelTipo) {
    $this->imovelTipo = $imovelTipo;
  }

  public function getTipoContrato() {
    return $this->tipoContrato;
  }

  public function setTipoContrato(TipoContrato $tipoContrato) {
    $this->tipoContrato = $tipoContrato;
  }

  public function getCidade() {
    return $this->cidade;
  }

  public function setCidade($cidade) {
    $this->cidade = $cidade;
  }

}

?>