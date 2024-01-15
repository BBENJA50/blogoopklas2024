<?php

class User{
    public function fin_all_users(){
        global $database;
        $result =  $database->query("SELECT * FROM users"); //Hier komt de query
        return $result;
    }
}

?>