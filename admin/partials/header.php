<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SGA - Sistema de Gestão Acadêmico</title>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/sb-admin-2.css" rel="stylesheet">
  <link href="../assets/css/admin.css" rel="stylesheet">
</head>
<body data-alert="<?= (isset($_SESSION['mensagem'])) ? $_SESSION['mensagem'] : ''; ?>">
<?php 
  $_SESSION['mensagem'] = '';
?>
  <div id="conteudo">