<?php
require('../app/functions.php');
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
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-1">Nuova valutazione</h2>

                                <form method="POST" action="new_evaluationHandler">

                                    <div class="form-outline form-white mb-3">
                                        <label>Ragione sociale</label>
                                        <input type="text" name="ragioneSociale" placeholder="ragione sociale"
                                            class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <label>Costo</label>
                                        <input type="text" name="costo" placeholder="costo"
                                            class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <label>Data emissione</label>
                                        <input type="date" name="dataEmissione" placeholder="Data emissione"
                                            class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <label>Peso sollevato</label>
                                        <input type="text" name="pesoSollevato" placeholder="Peso sollevato"
                                            class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <label>Altezza da terra delle mani all'inizio del sollevamento</label>
                                        <select name="altezzaTerra" class="form-control form-control-lg"> //fattore A della
                                            tabella su classroom
                                            <option value="0">0</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value ="75">75</option>
                                            <option value="100">100</option>
                                            <option value="125">125</option>
                                            <option value="150">150</option>
                                            <option value=">175">>175</option>
                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <label>Distanza verticale di spostamento del peso fra inizio e fine del
                                            sollevamento</label>
                                        <select name="distanzaVerticale" class="form-control form-control-lg"> //fattore B della
                                            tabella su classroom
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                            <option value="70">70</option>
                                            <option value="100">100</option>
                                            <option value="150">150</option>
                                            <option value=">175">>175</option>
                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <label>Distanza orizzontale tra le mani e il punto di mezzo delle
                                            caviglie</label>
                                        <select name="distanzaOrizzontale" class="form-control form-control-lg"> //fattore C della
                                            tabella su classroom
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                            <option value="55">55</option>
                                            <option value="60">60</option>
                                            <option value=">63">>63</option>
                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <label>Distanza angolare del peso in gradi</label>
                                        <select name="distanzaAngolare" class="form-control form-control-lg"> //fattore D della
                                            tabella su classroom
                                            <option value="0°">0°</option>
                                            <option value="30°">30°</option>
                                            <option value="60°">60°</option>
                                            <option value="90°">90°</option>
                                            <option value="120°">120°</option>
                                            <option value="135°">135°</option>
                                            <option value=">135°">>135°</option>
                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <label>Giudizio sulla presa del carico</label>
                                        <select name="giudizioPresa" class="form-control form-control-lg"> //fattore E della
                                            tabella su classroom
                                            <option value="Buono">Buono</option>
                                            <option value="Scarso">Scarso</option>
                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <label>Frequenza dei gesti(numero di atti al minuto)</label>
                                        <select name="frequenzaGesti" class="form-control form-control-lg"> //fattore F della
                                            tabella su classroom
                                            <option value="0.20">0.20</option>
                                            <option value="1">1</option>
                                            <option value="4">4</option>
                                            <option value="6">6</option>
                                            <option value="9">9</option>
                                            <option value="12">12</option>
                                            <option value=">15">>15</option>
                                        </select>
                                    </div>

                                    <div class="form-outline form-white mb-1">
                                        <select name="frequenzaContinua" class="form-control form-control-lg"> //fattore F
                                            della
                                            tabella su classroom
                                            <option value="< 1 ora">< 1 ora </option>
                                            <option value="da 1 a 2 ore">da 1 a 2 ore</option>
                                            <option value="da 2 a 8 ore">da 2 a 8 ore</option>
                                        </select>
                                    </div>
                                    <br>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Inserisci</button>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>