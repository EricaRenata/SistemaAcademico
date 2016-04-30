<?php
class Database {

  private $mysql;
  private $columns;
  private $values;
  private $select;
  private $table;
  private $from;
  private $join;
  private $where;
  private $update;
  private $order_by;
  private $group_by;
  private $limit;
  private $offset;
  private $having;
  private $query;
  private $num_rows;
  private $last_query;
  private $insert_id;
  private static $join_types = array('INNER', 'LEFT', 'RIGHT', 'FULL OUTER');
  private static $operators = array('=', '!=', '>', '>=', '<', '<=', '<>', '!<', '!>', 'IN', 'NOT IN', 'NULL', 'NOT NULL', 'BETWEEN', 'LIKE', 'ILIKE');

  public function __construct() {
    $this->mysql = new mysqli('mysql.hostinger.com.br', 'u964773833_sga','236658gcou', 'u964773833_sga');
    if(mysqli_connect_errno()) {
      throw new Exception('Dados de conexão com o banco de dados incorretos');
    }

  }

  protected function clearAttributes() {
    $not = array('last_query', 'operators', 'join_types');
    $attrs = get_object_vars($this);
    foreach ($attrs as $key => $value) {
      if(!in_array($key, $not)) {
        $this->$key = null;
      }
    }
  }

  protected function escape_string($string) {
    if(is_array($string)) {
      foreach ($string as $key => $value) {
        $string[$key] = mysqli_escape_string($this->mysql, $value);
      }
    }
    else if(is_string($string)) {
      $string = mysqli_escape_string($this->mysql, $string);
    }
    return $string;
  }

  protected function _where($column, $value, $operator, $type, $escape) {
    if(!is_string($column)) {
      throw new Exception('Nome da coluna não é string');
    }
    if(!in_array($operator, self::$operators)) {
      throw new Exception('Operador não existente');
    }
    if(!in_array(strtoupper($operator), array('IN', 'NOT IN', 'BETWEEN')) && is_array($value)) {
      throw new Exception('Valor não pode ser array neste tipo de operação');
    }
    if(strtoupper($operator) == 'BETWEEN' and !is_array($value)) {
      throw new Exception('O range precisa ser array');
    }
    $type = (empty($this->where)) ? 'WHERE' : $type;
    $operator = (empty($operator)) ? '=' : $operator;
    $escape = (!is_bool($escape)) ? TRUE : $escape;
    if($escape) {
      $value = $this->escape_string($value);
    }
    if(in_array(strtoupper($operator), array('IN', 'NOT IN'))) {
      $value = (is_array($value)) ? implode("','", $value) : $value;
      $where = " $type $column $operator ('$value')";
    }
    else if(in_array(strtoupper($operator), array('NULL', 'NOT NULL'))) {
      $where = " $type $column IS $operator";
    }
    else if(strtoupper($operator) == 'BETWEEN') {
      $start = current($value);
      $end = end($value);
      $where = " $type $column $operator '$start' AND '$end'";
    }else {
      $where = " $type $column $operator '$value'";
    }
    $this->where .= $where;
    return $this;
  }

  protected function _select($columns, $type) {
    $columns = (is_array($columns)) ? implode(', ', $columns) : $columns;
    $array_columns = explode(', ', $columns);
    $select_type = (empty($this->select)) ? 'SELECT' : ',';
    foreach ($array_columns as $column) {
      if(preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $column)) {
        $this->columns[] = $column;
      }
    }
    if(empty($type)) {
      $select = "$select_type $columns";
    }else {
      $select = "$select_type $type ($columns)";
    }
    $this->select .= $select;
    return $this;
  }

  public function begin() {
    $this->mysql->query('BEGIN');
    return $this;
  }

  public function rollback() {
    $this->mysql->query('ROLLBACK');
    return $this;
  }

  public function where($column, $value, $escape = FALSE) {
    if(is_array($column)) {
      foreach ($column as $key => $value) {
        $this->_where($key, $value, $operator, 'AND', $escape);
      }
    }else if(is_string($column)) {
      $this->_where($column, $value, '=', 'AND', $escape);
    }
    return $this;
  }

  public function or_where($column, $value, $escape = FALSE) {
    if(is_array($column)) {
      foreach ($column as $key => $value) {
        $this->_where($key, $value, $operator, 'OR', $escape);
      }
    }else if(is_string($column)) {
      $this->_where($column, $value, '=', 'OR', $escape);
    }
    return $this;
  }

  public function where_in($column, $values, $escape = FALSE) {
    $this->_where($column, $values, 'IN', 'AND', $escape);
    return $this;
  }

  public function or_where_in($column, $values, $escape = FALSE) {
    $this->_where($column, $values, 'IN', 'OR', $escape);
    return $this;
  }

  public function where_not_in($column, $values, $escape = FALSE) {
    $this->_where($column, $values, 'NOT IN', 'AND', $escape);
    return $this;
  }

  public function or_where_not_in($column, $values, $escape = FALSE) {
    $this->_where($column, $values, 'NOT IN', 'OR', $escape);
    return $this;
  }

  public function where_null($column, $escape = FALSE) {
    $this->_where($column, NULL, 'NULL', 'AND', $escape);
    return $this;
  }

  public function or_where_null($column, $escape = FALSE) {
    $this->_where($column, NULL, 'NULL', 'OR', $escape);
    return $this;
  }

  public function where_not_null($column, $escape = FALSE) {
    $this->_where($column, NULL, 'NOT NULL', 'AND', $escape);
    return $this;
  }

  public function or_where_not_null($column, $escape = FALSE) {
    $this->_where($column, NULL, 'NOT NULL', 'OR', $escape);
    return $this;
  }

  public function where_between($column, $range, $escape = FALSE) {
    $this->_where($column, $range, 'BETWEEN', 'AND', $escape);
    return $this;
  }

  public function or_where_between($column, $range, $escape = FALSE) {
    $this->_where($column, $range, 'BETWEEN', 'OR', $escape);
    return $this;
  }

  public function group_start() {
    $this->where .= '(';
  }

  public function group_end() {
    $this->where .= ')';
  }

  public function group_by($columns) {
    $columns = (is_array($columns)) ? implode(', ', $columns) : $columns;
    $this->group_by = ' GROUP BY ' . $columns;
    return $this;
  }

  public function order_by($columns, $order = 'ASC') {
    $columns = (is_array($columns)) ? implode(', ', $columns) : $columns;
    if(strpos(strtoupper($columns), 'DESC') || strpos(strtoupper($columns), 'ASC')) {
      if(empty($this->order_by)) {
        $this->order_by = " ORDER BY $columns";
      }else {
        $this->order_by = ", $columns";
      }
    }else {
      $columns = (is_array($columns)) ? implode(', ', $columns) : $columns;
      if(empty($this->order_by)) {
        $this->order_by = " ORDER BY $columns $order";
      }else {
        $this->order_by .= ", $columns $order";
      }
    }
    return $this;
  }

  public function limit($limit) {
    if(!is_numeric($limit)) {
      throw new Exception('Valor do limite não é numérico');
    }
    $this->limit = " LIMIT $limit";
    return $this;
  }

  public function offset($offset) {
    if(!is_numeric($offset)) {
      throw new Exception('Valor do offset não é numérico');
    }
    $this->offset = " OFFSET $offset";
    return $this;
  }

  public function having($column, $having, $operator = '=') {
    if(!is_string($column)) {
      throw new Exception('Nome da coluna não é string');
    }
    if(!in_array($operator, self::$operators)) {
      throw new Exception('Operador não existente');
    }
    if(empty($this->having)) {
      $this->having = " HAVING $column $operator $having";
    }else {
      $this->having .= " AND $column $operator $having";
    }
  }

  public function or_having($column, $having, $operator = '=') {
    if(!is_string($column)) {
      throw new Exception('Nome da coluna não é string');
    }
    if(!in_array($operator, self::$operators)) {
      throw new Exception('Operador não existente');
    }
    $this->having .= " OR $column $operator $having";
  }

  public function select($columns = '*', $type = NULL) {
    $this->_select($columns, $type);
    return $this;
  }

  public function select_count($column = '*') {
    $this->_select($column, 'COUNT');
    return $this;
  }

  public function select_max($column) {
    $this->_select($column, 'MAX');
    return $this;
  }

  public function select_min($column) {
    $this->_select($column, 'MIN');
    return $this;
  }

  public function select_sum($column) {
    $this->_select($column, 'SUM');
    return $this;
  }

  public function select_avg($column) {
    $this->_select($column, 'AVG');
    return $this;
  }

  public function from($from) {
    if(!is_string($from)) {
      throw new Exception('Nome da tabela não é string');
    }
    $this->from = " FROM $from";
    $this->table = $from;
    return $this;
  }

  public function join($table, $union_column, $type = 'INNER') {
    if(!is_string($table)) {
      throw new Exception('Nome da tabela não é string');
    }
    if(!in_array(strtoupper($type), self::$join_types)) {
      throw new Exception('Tipo de join não existente');
    }
    $union = (count(explode(' ', $union_column)) == 1) ? "USING($union_column)" : "ON($union_column)";
    $this->join .= " $type JOIN $table $union";
    return $this;
  }

  public function get($table = NULL) {
    if(empty($this->select)) {
      $this->select();
    }
    if(!empty($table)) {
      $this->from($table);
    }
    $query = implode(array(
      $this->select,
      $this->from,
      $this->join,
      $this->where,
      $this->group_by,
      $this->order_by,
      $this->limit,
      $this->offset,
      $this->having
    ));
    $this->query = $this->query($query);
    $this->num_rows = $this->query->num_rows;
    $this->last_query = $query;
    return $this;
  }

  public function num_rows() {
    $num_rows = $this->num_rows;
    $this->clearAttributes();
    return $num_rows;
  }

  public function row() {
    $query = $this->query;
    $this->clearAttributes();
    return mysqli_fetch_object($query);
  }

  public function row_array() {
    $query = $this->query;
    $this->clearAttributes();
    return mysqli_fetch_array($query);
  }

  public function result() {
    $data = array();
    if(!empty($this->query)) {
      while($result = mysqli_fetch_object($this->query)) {
        $data[] = $result;
      }
      $this->clearAttributes();
    }
    return $data;
  }

  public function result_array() {
    $data = array();
    while($result = mysqli_fetch_assoc($this->query)) {
      $data[] = $result;
    }
    $this->clearAttributes();
    return $data;
  }

  public function delete($table) {
    if(!is_string($table)) {
      throw new Exception('Nome da tabela não é string');
    }
    $this->table = $table;
    $query = "DELETE FROM $table $this->where";
    $this->query = $this->mysql->query($query);
    $this->last_query = $query;
    $this->clearAttributes();
  }

  public function insert($table, $items, $escape = FALSE) {
    if(!is_string($table)) {
      throw new Exception('Nome da tabela não é string');
    }
    if(!is_array($items)) {
      throw new Exception('Itens do insert não estão no formato array');
    }
    $this->table = $table;
    $escape = (!is_bool($escape)) ? TRUE : $escape;
    if($escape) {
      $items = $this->escape_string($items);
    }
    $columns = implode(', ', array_keys($items));
    $values = "'".implode("', '", $items)."'";
    $query = "INSERT INTO $table ($columns) VALUES ($values)";
    $this->query = $this->mysql->query($query);
    $this->last_query = $query;
    $this->clearAttributes();
    return $this->query;
  }

  public function update($table, $items, $escape = FALSE) {
    if(!is_string($table)) {
      throw new Exception('Nome da tabela não é string');
    }
    if(!is_array($items)) {
      throw new Exception('Itens do update não estão no formato array');
    }
    $this->table = $table;
    $escape = (!is_bool($escape)) ? TRUE : $escape;
    if($escape) {
      $items = $this->escape_string($items);
    }
    foreach ($items as $column => $value) {
      $this->update[] = "$column = '$value'";
    }
    $this->update = implode(', ', $this->update);
    $query = "UPDATE $table SET $this->update $this->where";
    $this->query = $this->mysql->query($query);
    $this->last_query = $query;
    $this->clearAttributes();
    return $this->query;
  }

  public function query($query, $escape = FALSE) {
    $escape = (!is_bool($escape)) ? TRUE : $escape;
    if($escape) {
      $query = $this->escape_string($query);
    }
    $this->query = $this->mysql->query($query);
    return $this;
  }

  public function getLastQuery() {
    return $this->last_query;
  }

}