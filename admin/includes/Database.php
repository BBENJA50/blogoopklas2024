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

    public function query($sql, $params=[]){
//        create a prepared statement
        $stmt = $this->connection->prepare($sql);
//        binding van de params
        if(!empty($params)) {
            $types = "";
            $values = [];
            foreach ($params as $param) {
                if (is_int($param)) {
                    $types .= "i";
                } elseif (is_float($param)) {
                    $types .= "d";
                } else {
                    $types .= "s";
                }
                $values[] = $param;
            }
            array_unshift($values, $types);
            call_user_func_array([$stmt, "bind_param"], $this->ref_values($values));
        }
            //execute statement
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result;




//        //method chaining
//        $result = $this->connection -> query($sql);
//
//        //var_dump($result); //gelijkaardig als console.log()
//        //print_r($result); //andere manier om te controleren
//
//        $this->confirm_query($result);
//        return $result;


    }

    private function ref_values($array){
        $refs = [];
        foreach ($array as $key => $value){
            if($key === 0){
                $refs[$key] = $value;
            } else {
                //Zal de plaats van het element in de array onthouden door het "&" teken
                $refs[$key] =&$array[$key];
            }
        }
        return $refs;
    }
    private function confirm_query($result){
        if(!$result){
            die("Query kan niet worden uitgevoerd " . $this->connection->error);
        }
    }
    public function escape_string($string){
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
    }
    //Constructors
    function __construct(){
        $this->open_db_connection();
    }
}

$database = new Database();

?>