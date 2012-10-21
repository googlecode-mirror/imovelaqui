<?php

/**
 * This file receive a request, and redirects to an especific controller.
 *
 * @author daniel
 */
include_once dirname(__DIR__) . '/controller/PosicaoAtualController.class.php';
include_once dirname(__DIR__) . '/controller/LocEspecificaController.class.php';

header('Access-Control-Allow-Origin: *');
header( 'Cache-Control: no-cache' );

if ($_POST['pesquisa'] != "locEspecifica") {

  if (!empty($_POST['distancia']) && !empty($_POST['longitude']) && !empty($_POST['latitude'])) {

    $lat = $_POST['latitude'];
    $long = $_POST['longitude'];
    $distance = $_POST['distancia'];

    $posicaoAtualController = new PosicaoAtualController();

    if (!is_null($posicaoAtualController->getJsonResponse($lat, $long, $distance))) {
      header('Content-type: application/json; charset="utf-8"');
      echo $posicaoAtualController->getJsonResponse($lat, $long, $distance);
    } else {
      echo 'NULL Response';
      exit();
    }
  } else {
    header("Content-Type: text/html; charset=utf-8");
    echo '<h1>Favor informar os parâmetros</h1>';
    exit();
  }
  
} else {
  
  if (!empty($_POST['cidade']) || !empty($_POST['bairro']) || !empty($_POST['rua'])) {

    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];

    $locEspecificaController = new LocEspecificaController();

    if (!is_null($locEspecificaController->getJsonResponse($cidade, $bairro, $rua))) {
      
      header('Content-type: application/json; charset="utf-8"');
      echo $locEspecificaController->getJsonResponse($cidade, $bairro, $rua);
      
    } else {
      
      echo 'NULL Response';
      exit();
      
    }
  } else {
    header("Content-Type: text/html; charset=utf-8");
    echo '<h1>Favor informar os parâmetros</h1>';
    exit();
  }
  
}
?>
