<?php

require('../app/database/connection.php');
require('../app/functions.php');


$utente = $_POST['user'];
$pwd = $_POST['pwd'];
$pass = md5($pwd);

 $query = "SELECT * FROM user WHERE username='$utente' AND password='$pass'";
 if($result = $connection->query($query)){
     if($result->num_rows > 0){
         $row = $result->fetch_array();
         $_SESSION['id_utente'] = $row['id_utente'];
         $_SESSION['username'] = $row['username'];
         $_SESSION['password'] = $row['password'];
         $_SESSION['ruolo'] = $row['ruolo'];
        header("location:home");
     }else{
         echo "credenziali errate!";
     }
 }

 ?>