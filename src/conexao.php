<?php
define('host','localhost');
define('usuario','root');
define('senha','');
define('bd','mbo');

$conn = mysqli_connect(host, usuario, senha, bd) or die ("Não foi possível conectar");


$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mbo";
$port = 3306;

try{
    $conn_PDO = new PDO('mysql:host=' . $host . ';port=' . $port. ';dbname=' . $dbname, $user, $pass);
}catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não realizada com sucesso!";
}

