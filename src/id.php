<?php
session_start();

define('host', 'localhost');
define('usuario', 'root');
define('senha', '');
define('bd', 'testes');

$conn = mysqli_connect(host, usuario, senha, bd) or die("Não foi possível conectar");

$id = $_SESSION['id'];

$consulta = mysqli_query($conn, "select * from registro where ID = $id");

while ($registro = mysqli_fetch_array($consulta)){
    $nome = $registro['nome'];
    $userid = $registro['userid'];
    $senha = $registro['senha'];
    $email = $registro['email'];
}

echo "$nome <br>";
echo "$userid <br>";
echo "$senha <br>";
echo "$email <br>";
echo "$id";