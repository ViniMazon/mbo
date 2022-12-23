<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testes de BD</title>
</head>

<body>
    <form action="testes.php" method="POST">

        <input type="text" name="usuario"><br>
        <input type="password" name="senha"><br>

        <input type="submit" name="enviar" value="enviar">
    </form>

    <table border="1">
        <tr>
            <td>Usuario:</td>
            <td>Senha:</td>
        </tr>
        <?php while($dado = $con->fetch_array()) { ?>
        <tr>
            <td><?php echo $dado["usuario"]; ?></td>
            <td><?php echo $dado["senha"]; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>

</html>

<?php

$conexao = mysqli_connect("localhost", "root", "", "testes");

#função cadastrar -->
if ($conexao == false) {
    echo "Não foi possivel conectar-se ao PhpMyAdmin";
    exit;
}

if (isset($_POST['enviar'])) {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (usuario, senha)
            VALUES ('$usuario', '$senha')";

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        echo "<br>";
        echo "Erro na Gravação do Registro";
    } else {
        echo "<br>";
        echo "Registro Gravado";
    }
}
#função cadastrar -->

#função exibir -->
$consulta = "Select * from usuarios";
$con = $mysqli->query($consulta) or die($mysqli->error);
#função exibir -->
?>