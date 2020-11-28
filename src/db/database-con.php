<?php

class Database{

    private $dbUser = "ahdmin";
    private $dbPw = "strongpassword";
    private $dbServer = "maria-db";
    private $dbName = "mainDB";
    private $connection;

    function __construct(){
        $this->connectDB();
        
    }

    public function __set($dbProperty, $value){
        switch($dbProperty){
            case "user":
                $this->dbUser = $value;
            break;
            case "pw":
                $this->dbPw = $value;
            break;
            case "server":
                $this->sql = $value;
            break;
            default:
            echo "Property doesn't exist";
        }
    }

    public function get_dbName(){
        return $this->dbName;
    }

    private function connectDB(){
        $this->connection = mysqli_connect($this->dbServer, $this->dbUser, $this->dbPw);
        $conn = $this->connection;

        if(!$this->connection){
            echo die(" Database connection failed: " . mysqli_connect_error());
        }else{
            echo " Database connection was successful";
            $selectedDB = mysqli_select_db($conn, $this->dbName);

            if (!$selectedDB) {
                echo die("Select failed: " . mysqli_select_error());
            } else {
                echo " Select was successfully";
            }
        }

    }

    public function sendData(){
        $conn = $this->connection;
        if(isset($_POST["submit"])){
        $sql = "INSERT INTO Person(FirstName, LastName, Age, Email) Values ('$_POST[firstName]', '$_POST[lastName]', '$_POST[age]', '$_POST[email]')";
        

        if(mysqli_query($conn, $sql) === true){
            echo "<p>Your query was successful</p>";
        }else{
            echo "Your query failed" . $conn->error;
            }
        }
        }


}

$customDB = new Database();