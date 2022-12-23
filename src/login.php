<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login MbO</title>
</head>

<body>

    <div class="topo">

        <img src="logo topo.png">
        <p> Management by Objectives</p>

    </div>

    <div class="center">
        <div class="login">

            <div class="container-head">
                <img src="logo login.png">
                <h1>Volkswagen Brasil</h1>
            </div>

            <p class="bv">Bem vindo ao MbO</p>

            <form method="post" action="index.php">

                <label>N° pessoal:</label><br>
                <input type="text" name="usuario" placeholder="Digite seu número pessoal" class="text-field"><br>

                <label>Senha:</label><br>
                <input type="password" name="senha" placeholder="Digite sua senha" class="password-field">

                <!--<p class="link"><a href="#">Esqueceu sua senha?</a></p>-->

                <input type="submit" name="enviar" value="Entrar">

                <p class="duvidas">Para entrar nesse sistema digite os dados acima, e para qualquer dúvida contate o
                    suporte.
                </p>

            </form>

        </div>
    </div>

</body>

</html>