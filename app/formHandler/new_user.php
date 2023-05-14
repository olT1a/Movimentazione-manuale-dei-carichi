<?php

require('../app/database/connection.php');
require('../app/functions.php');


$utente = $_POST['user'];
$pwd = $_POST['pwd'];
$pass = hash("sha512", $pwd);
$role = $_POST['ruolo'];
$roleValue;

if($role == "Amministratore"){
    $roleValue = 1;
} else {
    $roleValue = 0;
}
$query = "INSERT INTO user (username, password, ruolo) VALUES ('$utente', '$pass', '$roleValue')";
if($connection->query($query) === true){
    echo 'utente aggiunto';
    header("refresh:3; url=home");
}
?>