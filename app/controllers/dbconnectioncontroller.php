<?php
    
    
    class dbconnectioncontroller extends Controller{
    
    public function getDatabaseConnection(){
        require __DIR__ . '/../config/dbconfig.php';
        try{
            $connection = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo "Database connection failed: " . $e->getMessage();
        }
    }
}
