<?php
require('../app/functions.php');
require('../app/database/connection.php');
checkId();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MMC</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <style>
        table a{
            text-decoration: underline !important;
            color: blue !important;
        }
    </style>

    </head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark" >
        <div class="container-fluid">
            <a class="navbar-brand" href="home">
                <?= "Benvenuto," . " " . $_SESSION['username']; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                    if (!isset($_SESSION['id_utente'])) {
                        echo '<li class="nav-item">
                         <a class="nav-link" href="login">Login</a>
                         </li>';
                    } else {
                        echo '<li class="nav-item">
                         <a class="nav-link" href="personal_area">Area personale</a>
                         </li>';
                        if ($_SESSION['ruolo'] == 1) {
                            echo '<li class="nav-item">
                            <a class="nav-link" href="nuovaValutazione">Inserisci nuova valutazione</a>
                            </li>';
                            echo '<li class="nav-item">
                            <a class="nav-link" href="nuovoUtente">Inserisci nuovo utente</a>
                            </li>';
                        }
                        
                    }
                    ?>
                    <li class="nav-item">
                    <a class="nav-link" href="cerca">Cerca per ragione sociale</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class='container my-5 text-center'>
        <h1>Valutazioni</h1>
        <?php
        if($_SESSION['ruolo'] == 1){
        echo '<table id="valutazioni"  class="table">
    <tr>
        <th>ID</th>
        <th>Autore</th>
        <th>Ragione sociale</th>
        <th>Data emissione</th>
        <th>Costo €</th>
        <th>Peso sollevato Kg</th>
        <th>Peso raccomandato Kg</th>
        <th>Indice</th>
        <th>Valutazione</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>';
        }else{
            echo '<table id="valutazioni"  class="table">
            <tr>
                <th>ID</th>
                <th>Autore</th>
                <th>Ragione sociale</th>
                <th>Data emissione</th>
                <th>Costo</th>
                <th>Peso sollevato Kg</th>
                <th>Peso raccomandato Kg</th>
                <th>Indice</th>
                <th>Valutazione</th>
                <th></th>
            </tr>';
        }

        $query = "SELECT * FROM valutazioni";
        $rValutazioni = $connection->query($query);
        if ($rValutazioni->num_rows > 0) {
            while ($row = $rValutazioni->fetch_assoc()) {
                if ($_SESSION['ruolo'] == 1) {
                    echo "<tr>
            <td>$row[id_valutazione]</td>
            <td>$row[autore]</td>
            <td>$row[ragioneSociale]</td>
            <td>$row[dataEmissione]</td>
            <td>$row[costo]</td>
            <td>$row[pesoSollevato]</td>
            <td>$row[pesoRaccomandato]</td>
            <td>$row[indiceSollevamento]</td>
            <td>$row[valutazione]</td>
            <td><a href='modifica?id=$row[id_valutazione]'>Modifica</a></td>
            <td><a href='elimina?id=$row[id_valutazione]'>Elimina</a></td>
            <td><a onclick='stampa($row[id_valutazione])'>Stampa PDF</a></td>
            </tr>"; 
                } else {
                    echo "<tr>
                    <td>$row[id_valutazione]</td>
                    <td>$row[autore]</td>
                    <td>$row[ragioneSociale]</td>
                    <td>$row[dataEmissione]</td>
                    <td>$row[costo]</td>
                    <td>$row[pesoSollevato]</td>
                    <td>$row[pesoRaccomandato]</td>
                    <td>$row[indiceSollevamento]</td>
                    <td>$row[valutazione]</td>
                    <td><a onclick='stampa($row[id_valutazione])'>Stampa PDF</a></td>
                    </tr>";
                }
            }
        }
        echo '</table>';

        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script>
        function stampa(id){
            window.open('stampa?id=' + id , '_blank').focus()
        }
    </script>
        
</body>

</html>