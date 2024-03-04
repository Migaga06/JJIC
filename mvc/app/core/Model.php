<?php

class Model extends Database{
    public function findAll(){
        $query = 'SELECT * FROM users';
        $result = $this->query($query);
        if($result){
            return $result;
        }

        return false;
    }
}