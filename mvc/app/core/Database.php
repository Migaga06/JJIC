<?php 

Class Database{
    public function connect(){
        $string = "mysql:host=localhost;dbname=mvc_joseph";
        $con = new PDO($string, 'root', '');
        return $con;
    }

    public function query ($query, $date =[]){
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($date);

        if($check){
            $result = $stm->fetchAll(PDO::FETCH_OBJ);

            if(is_array($result) && count($result) > 0){
                return $result;
            }
        }
        
        return false;
    }
}