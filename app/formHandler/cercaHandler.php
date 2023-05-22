<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="js/redirect.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        table a{
            text-decoration: underline !important;
            color: blue !important;
        }
    </style>
</head>

<body>
    <div class='container my-5 text-center'>

        <?php
        require('../app/database/connection.php');

        $ragioneSociale = $_POST['ragioneSociale'];
        if ($_SESSION['ruolo'] == 1) {
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
        <th></th>
        <th></th>
    </tr>';
        } else {
            echo '<table id="valutazioni">
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

        $query = "SELECT * FROM valutazioni WHERE ragioneSociale = '$ragioneSociale' ";
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
        <br>
        <a href='home'><button class="btn btn-outline-dark btn-lg px-5">Torna alla home</button></a>
    </div>
    <script>
        function stampa(id){
            window.open('stampa?id=' + id , '_blank').focus()
        }
    </script>
</body>