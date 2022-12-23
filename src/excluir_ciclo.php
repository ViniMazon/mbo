<?php
session_start();

include("conexao.php");

$cod_ciclo = $_SESSION['cod_ciclo'];

$e_ciclo = "DELETE FROM ciclo WHERE id=$cod_ciclo";
$e_ciclo_query = mysqli_query($conn, $e_ciclo);

$e_item = "DELETE FROM item WHERE id=$cod_ciclo";
$e_item_query = mysqli_query($conn, $e_item);

if(isset($e_ciclo_query)){
    echo"$cod_ciclo <br>";
    echo"vish1";
    echo"<br><br>";
}

if(isset($e_item_query)){
    echo"vish2";
}
