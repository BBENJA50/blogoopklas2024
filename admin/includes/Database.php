<?php

require_once('config.php');
class Database{

    public $connection;
    public function open_db_connection(){
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(mysqli_connect_errno()){
            printf("Connectie mislukt: %s\n", mysqli_connect_errno());
            exit();
        }
    }

    public function query($sql){
        //method chaining
        $result = $this->connection -> query($sql);
        $this->confirm_query($result);
        return $result;
    }
    private function confirm_query($result){
        if(!$result){
            die("Query kan niet worden uitgevoerd " . $this->connection->error);
        }
    }
    function __construct(){
        $this->open_db_connection();
    }
}

$database = new Database();

?>