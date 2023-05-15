<?php
require('../app/fpdf/fpdf.php');
require('../app/database/connection.php');

$id = $_GET['id'];

$nomeAutore;

$pdf=new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$query = "SELECT * FROM valutazioni WHERE id_valutazione='$id' ";
    $result = $connection->query($query);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
        $id_valutazione = $row['id_valutazione'];
        $autore = $row['autore'];
        $ragioneSociale = $row['ragioneSociale'];
        $dataEmissione = $row['dataEmissione'];
        $costo = $row['costo'];
        $pesoSollevato = $row['pesoSollevato'];
        $altezzaTerra = $row['altezzaTerra'];
        $distanzaVerticale = $row['distanzaVerticale'];
        $distanzaOrizzontale = $row['distanzaOrizzontale'];
        $dislocazioneAngolare = $row['dislocazioneAngolare'];
        $giudizioPresa = $row['giudizioPresa'];
        $frequenza = $row['frequenza'];
        $durata = $row['durata'];
        $pesoRaccomandato = $row['pesoRaccomandato'];
        $valutazione = $row['valutazione'];
        $indiceSollevamento = $row['indiceSollevamento'];

        $pdf->Cell(190,10,"Ragione sociale: $ragioneSociale",1,1,'C');
        $pdf->Ln();
        $pdf->Cell(40,10,"id autore: $autore");
        $pdf->Ln();
        $pdf->Cell(40,10,"id valutazione: $id_valutazione");
        $pdf->Ln();
        $pdf->Cell(40,10,"Data emissione: $dataEmissione");
        $pdf->Ln();
        $pdf->Cell(40,10,"Costo: $costo euro");
        $pdf->Ln();
        $pdf->Cell(40,10,"Peso sollevato: $pesoSollevato Kg");
        $pdf->Ln();
        $pdf->Cell(40,10,"Altezza da terra: $altezzaTerra cm");
        $pdf->Ln();
        $pdf->Cell(40,10,"Distanza verticale: $distanzaVerticale cm");
        $pdf->Ln();
        $pdf->Cell(40,10,"Distanza orizzontale: $distanzaOrizzontale cm");
        $pdf->Ln();
        $pdf->Cell(40,10,"Dislocazione angolare: $dislocazioneAngolare gradi");
        $pdf->Ln();
        $pdf->Cell(40,10,"Giudizio presa: $giudizioPresa");
        $pdf->Ln();
        $pdf->Cell(40,10,"Frequenza gesti: $frequenza atti al minuto");
        $pdf->Ln();
        $pdf->Cell(40,10,"Durata: $durata");
        $pdf->Ln();
        $pdf->Cell(40,10,"Peso raccomandato: $pesoRaccomandato Kg");
        $pdf->Ln();
        $pdf->Cell(40,10,"Indice di sollevamento: $indiceSollevamento");
        $pdf->Ln();
        $pdf->Cell(40,10,"Valutazione: $valutazione");
        $pdf->Ln();
        }
    }
$pdf->Output();











?>