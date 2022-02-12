<?php
 class connection{
    //database connection
   public function dbConnection(){
    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "member";

    $link = mysqli_connect($hostName,$userName,$password,$dbName);
    return $link;
   }
}

?>