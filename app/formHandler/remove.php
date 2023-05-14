<?php
require('../app/database/connection.php');

$id = $_GET['id'];

$query = "DELETE FROM valutazioni WHERE id_valutazione='$id'";
if ($connection->query($query) === TRUE) {
    header("location: home");
  }

?>