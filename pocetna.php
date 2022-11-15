<?php

require "dbBroker.php";
require "models/Zaposleni.php";


 session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
} 

if (isset($_COOKIE["user"])){
    $poruka="Dobrodošla, " . $_COOKIE["user"] . "!";
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Salon lepote</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

    <div class="container-xxl py-5">
        <div class="container">
        <center><h3 id="poruka"><?= $poruka; ?></h3></center>
            <div class="row" id="rowc">
                <div class="col-md-5">
                <label for="zaposleni">Zaposleni</label>
                    <select class="form-control" id="zaposleni" onchange="filtriraj()">
                    </select>
                </div>
                <div class="col-md-5">
                <label for="sortiranje">Datum</label>
                    <select class="form-control" id="sortiranje" onchange="filtriraj()">
                        <option value="asc">Rastuće</option>
                        <option value="desc">Opadajuće</option>
                    </select>
                </div>
            </div>
            </div>
            <br/>
            <br/>
            <div class="row g-4" id="rezultat" >
            </div>
        
            <center>
            <a href="dodaj.php", class="BtnForm">Dodaj tretman</a>
            <a href="izmeni.php", class="BtnForm">Izmeni termin</a>
            <a href="obrisi.php", class="BtnForm">Obrisi tretman</a>
            </center>

        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function popuni() {
            let zaposleni = '1';
            let sortiranje = 'asc';
            $.ajax({
                url: "pretragaTretmana.php",
                data: {
                    zaposleni: zaposleni,
                    sortiranje: sortiranje
                },
                success: function (podaci) {
                    $("#rezultat").html(podaci);
                }
            });
        }
        popuni();

        function popuniZaposlene() {
            $.ajax({
                url: 'popuniZaposlene.php',
                success: function (data) {
                   $("#zaposleni").html(data);
                }
            });
        }
        popuniZaposlene();
 


        function filtriraj() {
            let zaposleni = $("#zaposleni").val();
            let sortiranje = $("#sortiranje").val();
            $.ajax({
                url: 'pretragaTretmana.php',
                data: {
                    zaposleni: zaposleni,
                    sortiranje: sortiranje
                },
                success: function (data) {
                    $("#rezultat").html(data);
                }
            });
        }

    </script>

</body>
</html>
