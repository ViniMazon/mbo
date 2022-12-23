<?php
session_start()
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultimo ID</title>
</head>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<body>
    <fieldset witdth="300px">
        <legend>Novo Registro de usuário</legend>
        <form method="post">
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nome"></td>
                </tr>

                <tr>
                    <td>ID de usuário:</td>
                    <td><input type="text" name="userid"></td>
                </tr>

                <tr>
                    <td>Senha:</td>
                    <td><input type="text" name="senha"></td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email"></td>
                </tr>

                <tr>
                    <td><input type="submit" name="submit" value=" Enviar"></td>
                </tr>
        </form>
        </table>
    </fieldset>
</body>

</html>

<?php

define('host', 'localhost');
define('usuario', 'root');
define('senha', '');
define('bd', 'testes');

$conn = mysqli_connect(host, usuario, senha, bd) or die("Não foi possível conectar");

if (isset($_POST['submit'])) {
    $nome   = $_POST['nome'];
    $userid = $_POST['userid'];
    $senha  = $_POST['senha'];
    $email  = $_POST['email'];

    $sql = "INSERT INTO registro (nome, userid, senha, email) VALUES
        ('$nome', '$userid', '$senha', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "O novo ID inserido é: " . $conn->insert_id;

        $id = $conn->insert_id;

        echo "<br>teste $id";
    } else {
        echo "Não inserido";
    }

    $_SESSION['id'] = $id;
    
    header('location: id.php');
}
?>