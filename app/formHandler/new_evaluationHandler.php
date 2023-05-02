<?php

$ragioneSociale = $_POST['ragioneSociale'];
$costo = floatval($_POST['costo']);
$dataEmissione = $_POST['dataEmissione'];
$pesoSollevato = floatval($_POST['pesoSollevato']);

$altezzaTerra = $_POST['altezzaTerra'];
$distanzaVerticale = $_POST['distanzaVerticale'];
$distanzaOrizzontale = $_POST['distanzaOrizzontale'];
$distanzaAngolare = $_POST['distanzaAngolare'];
$giudizio = $_POST['giudizioPresa'];
$frequenzaGesti = $_POST['frequenzaGesti'];
$frequenzaContinua = $_POST['frequenzaContinua'];

$IS = null;
$CP = 20;

$A = null;
$B = null;
$C = null;
$D = null;
$E = null;
$F = null;

switch ($altezzaTerra) {
    case "0":
        $A = 0.77;
        break;
    case "25":
        $A = 0.85;
        break;
    case "50":
        $A = 0.93;
        break;
    case "75":
        $A = 1;
        break;
    case "100":
        $A = 0.93;
        break;
    case "125":
        $A = 0.85;
        break;
    case "150":
        $A = 0.78;
        break;
    case ">175":
        $A = 0;
        break;
}

switch ($distanzaVerticale) {
    case "25":
        $B = 1;
        break;
    case "30":
        $B = 0.97;
        break;
    case "40":
        $B = 0.93;
        break;
    case "50":
        $B = 0.91;
        break;
    case "70":
        $B = 0.88;
        break;
    case "100":
        $B = 0.87;
        break;
    case "150":
        $B = 0.86;
        break;
    case ">175":
        $B = 0;
        break;
}

switch ($distanzaOrizzontale) {
    case "25":
        $C = 1;
        break;
    case "30":
        $C = 0.83;
        break;
    case "40":
        $C = 0.63;
        break;
    case "50":
        $C = 0.50;
        break;
    case "55":
        $C = 0.45;
        break;
    case "60":
        $C = 0.42;
        break;
    case ">63":
        $C = 0;
        break;
}

switch ($distanzaAngolare) {
    case "0°":
        $D = 1;
        break;
    case "30°":
        $D = 0.90;
        break;
    case "60°":
        $D = 0.81;
        break;
    case "90°":
        $D = 0.71;
        break;
    case "120°":
        $D = 0.52;
        break;
    case "135°":
        $D = 0.57;
        break;
    case ">135°":
        $D = 0;
        break;
}

switch ($distanzaAngolare) {
    case "Buono":
        $E = 1;
        break;
    case "Scarso":
        $E = 0.90;
        break;
}

switch ($frequenzaGesti) {
    case "0.20":
        switch ($frequenzaContinua) {
            case "< 1 ora":
                $F = 1;
                break;
            case "da 1 a 2 ore":
                $F = 0.95;
                break;
            case "da 2 a 8 ore":
                $F = 0.85;
                break;
        }
        break;
    case "1":
        switch ($frequenzaContinua) {
            case "< 1 ora":
                $F = 0.94;
                break;
            case "da 1 a 2 ore":
                $F = 0.88;
                break;
            case "da 2 a 8 ore":
                $F = 0.75;
                break;
        }
        break;
    case "4":
        switch ($frequenzaContinua) {
            case "< 1 ora":
                $F = 0.84;
                break;
            case "da 1 a 2 ore":
                $F = 0.72;
                break;
            case "da 2 a 8 ore":
                $F = 0.45;
                break;
        }
        break;
    case "6":
        switch ($frequenzaContinua) {
            case "< 1 ora":
                $F = 0.75;
                break;
            case "da 1 a 2 ore":
                $F = 0.5;
                break;
            case "da 2 a 8 ore":
                $F = 0.27;
                break;
        }
        break;
    case "9":
        switch ($frequenzaContinua) {
            case "< 1 ora":
                $F = 0.52;
                break;
            case "da 1 a 2 ore":
                $F = 0.3;
                break;
            case "da 2 a 8 ore":
                $F = 0.52;
                break;
        }
        break;
    case "12":
        switch ($frequenzaContinua) {
            case "< 1 ora":
                $F = 0.37;
                break;
            case "da 1 a 2 ore":
                $F = 0.21;
                break;
            case "da 2 a 8 ore":
                $F = 0;
                break;
        }
        break;
    case ">15":
        switch ($frequenzaContinua) {
            case "< 1 ora":
                $F = 0;
                break;
            case "da 1 a 2 ore":
                $F = 0;
                break;
            case "da 2 a 8 ore":
                $F = 0;
                break;
        }
        break;
}

$pesoRaccomandato = $CP * $A * $B * $C * $D * $E * $F;
if ($pesoRaccomandato != 0) {
    $IS = $pesoSollevato / $pesoRaccomandato;
    echo $IS;
} else {
    $IS = -1;
    echo $IS;
}


?>