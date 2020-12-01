<?php

class Database{

    private $dbUser;
    private $dbPw;
    private $dbServer;
    private $dbName;
    private $connection;

    function __construct($propUser="ahdmin", $propPW="strongpassword", $propServer="maria-db", $propName="mainDB"){
        $this->dbUser = $propUser;
        $this->dbPw = $propPW;
        $this->dbServer = $propServer;
        $this->dbName = $propName;
        $this->connectDB();
    }

    public function __get($property){
        echo "<br>Asked for value of " . $property . ", value is " . $this->$property;
    }

    public function __set($dbProperty, $value){
        switch($dbProperty){
            case "dbUser":
                $this->dbUser = $value;
            break;
            case "dbPw":
                $this->dbPw = $value;
            break;
            case "dbServer":
                $this->dbServer = $value;
            break;
            case "dbName":
                $this->dbName = $value;
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
            echo die("<br>Database connection failed: " . mysqli_connect_error());
        }else{
            echo "<br>Database connection was successful";
            $selectedDB = mysqli_select_db($conn, $this->dbName);

            if (!$selectedDB) {
                echo die("<br>Select failed: " . mysqli_select_error());
            } else {
                echo "<br>Select was successfully";
            }
        }

    }

    public function sendData(){
        $conn = $this->connection;
        if(isset($_POST["submit"])){
        $sql = "INSERT INTO Person(FirstName, LastName, Age, Email) Values ('$_POST[firstName]', '$_POST[lastName]', '$_POST[age]', '$_POST[email]')";
        

        if(mysqli_query($conn, $sql) === true){
            echo "<br><p>Your query was successful</p>";
        }else{
            echo "<br>Your query failed" . $conn->error;
            }
        }
        }


}

$customDB = new Database();
$customDB->dbServer;