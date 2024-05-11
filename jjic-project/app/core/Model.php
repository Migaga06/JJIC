<?php

class Model extends Database
{
  public $errors = [];

  public function __construct()
  {
    if (!property_exists($this, 'table')) {

      $this->table = strtolower($this::class) . 's';
    }
  }

  public function findAll()
  {
    $query = "select * from $this->table";
    $result = $this->query($query);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function where($column, $value)
  {
    $column = addslashes($column);
    $query = "select * from $this->table where $column = :value";
    $data  = $this->query($query, [
      'value' => $value
    ]);

    if(is_array($data)){
      if (property_exists($this, 'afterSelect')) {

        foreach($this->afterSelect as $func){
          $data = $this->$func($data);
        }
      }
    }

    return $data;
  }

  public function first($data, $data_not = [])
  {
    $keys = array_keys($data);
    $keys_not = array_keys($data_not);

    $query = "select * from $this->table where ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . " && ";
    }

    foreach ($keys_not as $key) {
      $query .= $key . " != :" . $key . " && ";
    }

    $query = trim($query, " && ");

    $data = array_merge($data, $data_not);
    $result = $this->query($query, $data);

    if ($result) {
      return $result[0];
    }
    return false;
  }

  public function insert($data)
  {
    //remove unwanted to edit
    if (property_exists($this, 'allowedColumns')) {
      foreach($data as $key => $column){
        if(!in_array($key, $this->allowedColumns)){
          unset($data[$key]);
        }
      }
    }
    if (property_exists($this, 'beforeInsert')) {

      foreach($this->beforeInsert as $func){
        $data = $this->$func($data);
      }
    }

    $columns = implode(', ', array_keys($data));
    $values = implode(', :', array_keys($data));
    $query = "insert into $this->table ($columns) values (:$values)";

    $this->query($query, $data);

    return false;
  }

  public function update($id, $data, $column = 'id')
  {
    $keys = array_keys($data);
    $query = "update $this->table set ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . ", ";
    }

    $query = trim($query, ", ");

    $query .= " where $column = :$column";

    $data[$column] = $id;
    $this->query($query, $data);
    
    return false;
  }

  public function delete($id, $column = 'id')
  {
    $data[$column] = $id;
    $query = "delete from $this->table where $column = :$column";

    $this->query($query, $data);

    return false;
  }

  public function check($column, $value){
    $column = addslashes($column);
    $query = "select * from $this->table where $column = :value";
    return $this->query($query,[
      'value'=>$value
    ]);
  }

  public function updateExi($column, $value, $whereVal){
    $column = addslashes($column);
    $query = "update $this->table set $column = :value where product_name = :whereVal";
    echo $query;
    return $this->query($query, [
      'value'=>$value,
      'whereVal'=>$whereVal
    ]);
  }
}