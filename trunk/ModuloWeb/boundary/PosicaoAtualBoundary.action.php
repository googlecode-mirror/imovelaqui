<?php

/**
 * This file captures the request of user and calls the controller for fetch the
 * data.
 *
 * @author daniel
 */
include dirname(__DIR__) . '/controller/PosicaoAtualController.class.php';


if (!empty($_GET['distancia']) && !empty($_GET['longitude']) && !empty($_GET['latitude'])) {
  $lat = $_GET['latitude'];
  $long = $_GET['longitude'];
  $distance = $_GET['distancia'];
  
} else {
  header("Content-Type: text/html; charset=utf-8");
  echo '<h1>Favor informar os parâmetros</h1>';
  exit();
}

$controller = new PosicaoAtualController();
if(!is_null($controller->getJSONResponse($lat, $long, $distance))){
  echo $controller->getJSONResponse($lat, $long, $distance);
} else {
  echo 'NULL Response';
  exit();
}

//if (!is_null($controller->getXMLResponse($lat, $long, $distance))) {
//  header("Content-Type: text/xml; charset=utf-8");
//  echo $controller->getXMLResponse($lat, $long, $distance);
//}
// else {
//  echo 'NULL Response';
//  exit();
//}
?>
