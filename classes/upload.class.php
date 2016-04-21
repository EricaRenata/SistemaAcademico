<?php
Class Upload extends Funcoes {
  public function setArquivos($itens) {
    $objetoSql = new Database();
    $objetoSql->insert('arquivos',$itens);
  }
}
?>