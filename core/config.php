<?php
include("Funcoes.php");
/* ONLINE */
if( ($_SERVER['SERVER_ADDR'] == "::1") || ($_SERVER['SERVER_ADDR'] == "localhost") ){
    $ip = $_SERVER['HTTP_HOST'];
}else{
    $ip = $_SERVER['SERVER_ADDR'];
}
define('IP',$ip);
$aux = substr( $_SERVER['REQUEST_URI'], strlen('/'));
if( substr( $aux, -1) == '/'){ $aux=substr( $aux, 0, -1); }
$link =explode( '/', $aux);


$server = $ip."/fc/";
define("URLPRINCIPAL","http://{$server}/");
define("URLSITE","http://{$server}/");
define("SERVER","http://{$server}/");
define("URL","http://{$server}/");
define("PASTA",$_SERVER['DOCUMENT_ROOT']."/fc");
include(PASTA."/model/autoload.php");