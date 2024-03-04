<?php

class Database
{
    public function connect()
    {
        //user - id, firstname, lastname, email, password
        $string = "mysql:host=localhost;dbname=jjic";
        $con = new PDO($string, 'root', '');
        return $con;
    }

    public function query ($query, $data =[])
    {
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);

        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);

            if (is_array($result) && count($result) > 0) {
                return $result;
            }
        }
        return false;
    }
}