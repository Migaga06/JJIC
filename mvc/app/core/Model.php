<?php

class Model extends Database
{
    public function __construct
    {
        if (!property_exists($this, 'table')) {

            $this->table = strtolower($this::class) . 's';
        }
    }
    public function findAll()
    {
        $query = "select * from users";
        $result = $this->query($query);
        if ($result) {
            return $result;
        }

        return false;
    }

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from users where ";

        foreach($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach($keys_not as $key) {
            $query .= $key . " != :" . $key . " && ";
        }

        $query = trim($query, " && ");
        show($query);
        
        $data = array_merge($data, $data_not);
        $result = $this->query($query, $data, $data_not);
        if($result)
        {
            return $result;
        }
        return false;
    }

    public function insert($data)
    {
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_keys(data));
        $query = "insert into $this->table ($columns) values
        (v:$values)";
        show($query);
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

}