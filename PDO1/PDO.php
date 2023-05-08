<?php
include("config_pdo.php");
class PDO1 extends PDO{

    private $dbname;
    private $user;
    private $pass;
    private $host;
    private $port;
    private $conn;
        
    /**
     * __construct
     *
     * @param  string $dbname
     * @param  int $port
     * @param  string $user
     * @param  string $pass
     * @param  string $host
     * @return void
     */
    function __construct($dbname=dbn,$port=portNum,$user=username,$pass=password,$host="127.0.0.1"){
        $this->dbname=$dbname;
        $this->user=$user;
        $this->pass=$pass;
        $this->host=$host;
        $this->port=$port;
        
        try{
            $this->conn = new PDO("mysql:host=$this->host:$this->port.;dbname=$this->dbname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();

        }
    }

    
    /**
     * close
     *
     * @return void
     */
    function close(){
        try{
            $this->conn = null; 
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        
    }    
    /**
     * creatDB
     *
     * @param  string $name
     * @return void
     */
    function creatDB($name){

        try{
            
            $this->conn = new PDO("mysql:host=$this->host:$this->port.;dbname=$this->dbname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS $name";
            $this->conn->exec($sql);
            $this->close();
            $this->conn = new PDO("mysql:host=$this->host:$this->port.;dbname=$name", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e){
            echo "<br>" . $e->getMessage();

        }

    }

    
    /**
     * CreatTable
     *
     * @param  string $nameTable
     * @param  string $infoTable
     * @return void
     */
    function CreatTable($nameTable,$infoTable){
        try{

            $sql ="CREATE TABLE IF NOT EXISTS  $nameTable ($infoTable)";
            
            $this->conn->exec($sql);
            
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();

        }

    }


    
    /**
     * Insert
     *
     * @param  string $nameTable
     * @param  string $nameColon
     * @param  string $data
     * @param  string $pass
     * @return void
     */
    function Insert($nameTable,$nameColon,$data,$pass=""){
        if($pass!=""){
            try{
                $pass=sha1($pass);
                $sql = "INSERT INTO $nameTable ($nameColon,pass) VALUES ($data,'$pass')";
                $this->conn->exec($sql);
                echo "New record created successfully";
            }catch(PDOException $e){
                echo $sql.  "<br>"  .$e->getMessage();
            }

        }
        else if($pass==""){

            try{
                $sql = "INSERT INTO $nameTable ($nameColon) VALUES ($data)";
                $this->conn->exec($sql);
                echo "New record created successfully";
            }catch(PDOException $e){
                echo $sql.  "<br>"  .$e->getMessage();
            }

        }

    }



    
    /**
     * delet
     *
     * @param  string $nameTable
     * @param  string $condition
     * @return void
     */
    function delet($nameTable,$condition){
        try{
            $sql="DELETE FROM $nameTable WHERE $condition";
            $this->conn->exec($sql);
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }



    
    /**
     * getData
     *
     * @param  string $colon
     * @param  string $table
     * @param  string $condition
     * @return string
     */
    function getData($colon,$table,$condition="1=1"){
        try{
            $sql="SELECT $colon FROM $table WHERE $condition";
            $info=$this->conn->prepare($sql);
            $info->execute();
            $result = $info->setFetchMode(PDO::FETCH_ASSOC);
            $out=$info->fetchAll();
            
            return $out;

        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();  
            return $e->getMessage();

        }

    }

    
    /**
     * Update
     *
     * @param  string $table
     * @param  string $colon
     * @param  string $value
     * @param  string $condition
     * @return void
     */
    function Update($table,$colon,$value,$condition="1=1"){
        try{
            $sql = "UPDATE $table SET $colon=$value WHERE $condition";
            $info=$this->conn->prepare($sql);
            $info->execute();


        }
        catch(PDOException $e){
            echo $sql . '<br>' . $e->getMessage();

        }
    }

}
?>