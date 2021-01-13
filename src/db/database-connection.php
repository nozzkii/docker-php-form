<?php

class Database{

    private 
    $dbUser,
    $dbServer, 
    $dbName, 
    $dbPw,
    $connection;
    public 
    $querySucess = "<br>Your query was successful ",
    $queryFail = "<br>Your query failed ",
    $firstName, 
    $lastName, 
    $streetAdress, 
    $secondStreetAdress, 
    $city, 
    $region, 
    $postal, 
    $country, 
    $userName,
    $hashedPassword;
    protected 
    $tableName = "Register";

    function __construct($propUser="ahdmin", $propPW="test", $propServer="db", $propName="myDB"){
        $this->dbUser = $propUser;
        $this->dbPw = $propPW;
        $this->dbServer = $propServer;
        $this->dbName = $propName;
        $this->connectDB();
        $this->createTable();
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
        $this->connection = mysqli_connect($this->dbServer, $this->dbUser, $this->dbPw, $this->dbName);
        $conn = $this->connection;

        if(!$this->connection){
            echo die("<br>Database connection failed: " . mysqli_connect_error());
        }
    }


    private function createTable(){
        $conn = $this->connection;
        global $tableName;
        $sql = "
        CREATE TABLE IF NOT EXISTS Register(
            ID int NOT NULL AUTO_INCREMENT,
            FirstName varchar(255),
            LastName varchar(255),
            StreetAdress varchar(255),
            SecondStreetAdress varchar(255),
            City varchar(255),
            Region varchar(255),
            Postal varchar(255),
            Country varchar(255),
            UserName varchar(255),
            UserPassword varchar(255),
            PRIMARY KEY (ID)
        )"; 
        
        if(mysqli_query($conn, $sql) === false){
            global $queryFail;
            echo $queryFail . $conn->error;
        }
    }

    public function sendData(){

        $conn = $this->connection;
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        if(isset($hashed_password)){
        $sql = "INSERT INTO Register(FirstName, LastName, StreetAdress, SecondStreetAdress, City, Region, Postal, Country, UserName, UserPassword) 
        Values ('$_POST[firstName]', '$_POST[lastName]', '$_POST[streetAdress]', '$_POST[secondStreetAdress]', '$_POST[city]', '$_POST[region]', 
        '$_POST[postal]', '$_POST[country]', '$_POST[userName]', '$hashed_password')";
        
        if(mysqli_query($conn, $sql) === true){
            global $querySucess;   
            echo $querySucess;
            }else{
                global $queryFail;
                echo $queryFail . $conn->error;
                }
            }
        //mysqli_close($conn);
        }
        

    public function fetchData(){
        $conn = $this->connection;
        //$userNameIn = $_POST['userName'];
        $sql = "SELECT FirstName, LastName, StreetAdress, SecondStreetAdress, City, Region, Postal, Country, UserName, UserPassword FROM `Register` WHERE UserName='$_POST[userName]'";
        
    if(mysqli_query($conn, $sql) !== FALSE){
            global $querySucess;
            $result = mysqli_query($conn, $sql);
            $followingData = $result->fetch_assoc();
            $this->userName =  $followingData['UserName'];
            $this->hashedPassword =  $followingData['UserPassword'];
            $this->firstName =  $followingData['FirstName'];
            $this->lastName =  $followingData['LastName'];
            $this->streetAdress =  $followingData['StreetAdress'];
            $this->secondStreetAdress =  $followingData['SecondStreetAdress'];
            $this->city =  $followingData['City'];
            $this->region =  $followingData['Region'];
            $this->postal =  $followingData['Postal'];
            $this->country =  $followingData['Country'];
        }else{
            echo "<br>Your query" . $sql . " " . $conn->error;
        }
        //mysqli_close($conn);
    }

    public function checkUserName($searchedString){
        $conn = $this->connection;
        $sql = "SELECT UserName FROM `Register` WHERE UserName='$searchedString'";
        $result = mysqli_query($conn, $sql);
        $followingData = $result->fetch_assoc();
        if ($followingData != "") {
        return True;
        }
        return False; 
    }

}

$customDB = new Database();