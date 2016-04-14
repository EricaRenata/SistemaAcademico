<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'database.class.php';
class Funcoes {

  public static function geraHeader() {
    session_start();
    if($_SESSION['logado'] != true) header("Location: ../login.php");
    include 'partials/header.php';
  }

  public static function geraFooter($parametros = false) {
    if(isset($parametros) && $parametros) {
      $scripts = $parametros;
    }
    include 'partials/footer.php';
  }

  public static function geraMenus() {
    include 'partials/navegacao.php';
  }

  public static function geraMenuTop() {
    include 'partials/menu_top.php';
  }

  public static function geraMenuEsquerda() {
    include 'partials/menu_esquerda.php';
  }

  public static function geraMenuDireita() {
    include 'partials/menu_direita.php';
  }

  public static function geraBreadCrumb() {
    include 'partials/breadcrumb.php';
  }

  public function setMensagem($mensagem) {
    $_SESSION['mensagem'] = (!empty($mensagem)) ? $mensagem : '';
  }

  public function setlog() {

  }

}