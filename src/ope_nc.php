<?php
session_start();

include('conexao.php');

$cod = $_SESSION['cod_gestor'];

$nc = "INSERT INTO ciclo (cod_gestor)
    VALUES ($cod)";

$criar_c = mysqli_query($conn, $nc);

$cod_ciclo = $conn->insert_id;

$ni = "INSERT INTO item (id)
VALUES ($cod_ciclo), ($cod_ciclo), ($cod_ciclo)";

$criar_i = mysqli_query($conn, $ni);

$_SESSION['cod_ciclo'] = $cod_ciclo;
$_SESSION['cod_gestor'] = $cod; 

header('location:novociclo.php');

?>