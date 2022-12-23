<?php
session_start();

if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    unset($_SESSION['nome']);
    header('location:login.php');
}

$nome = $_SESSION['nome'];
$cod = $_SESSION['cod_gestor'];

include('conexao.php');

?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: "Lato", sans-serif;
            background-image: url('nivus-1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .bg img {
            height: 100%;
            padding: 0;
            margin: 0;
            display: block;
            margin-left: auto;
        }

        .sidenav {
            height: 100%;
            width: 300px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #1F4E79;
            overflow-x: hidden;
            padding-top: 5px;
        }



        .container {
            display: flex;
            align-items: center;
            padding-left: 15px;
        }

        .container p {
            color: white;
            font-size: 50px;
            padding-left: 10px;
            padding-top: 5px;
            text-transform: bold;
            color: whitesmoke;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #8FAADC;
            display: block;
        }

        .sidenav p {
            padding-right: 10px;
            text-align: right;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .btn-sair {
            position: absolute;
            bottom: 0;
            width: 98%;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .corpo {
            margin-left: 320px;
            margin-right: 18px;
            margin-top: 20px;
        }

        .corpo p {
            color: #1F4E79;
            font-size: 25px;
        }

        .novo button {
            font-size: 23px;
            background: rgba(143, 170, 220, 255);
            border: none;
            border-radius: 8px;
            padding: 7px;
            padding-left: 35px;
            padding-right: 35px;
            margin-top: 10px;
            cursor: pointer;
            position: absolute;
            right: 25px;
        }

        .novo button:active {
            background: cornflowerblue;
        }

        .novo a {
            text-decoration: none;
            color: black;
        }

        .box {
            width: auto;
            overflow: hidden;
            background: rgba(180, 199, 231, 255);
            margin-top: 20px;
            border-radius: 10px;
        }

        .box a {
            text-decoration: none;
            color: black;
        }

        .box table {
            height: 180px;
            vertical-align: top;
        }

        .box table p {
            padding: 0;
            margin: 0;
            position: inline;
        }

        .box table .btns {
            height: 15px;
        }

        .box button {
            font-size: 18px;
            background: rgba(143, 170, 220, 255);
            border: none;
            border-radius: 7px;
            padding: 7px;
            margin: 0;
            width: 90px;
            margin-top: 10px;
            cursor: pointer;
        }

        .box button:active {
            background: cornflowerblue;
        }

        .box p {
            font-size: 30px;
            padding: 0;
            margin: 0;
            padding-left: 10px;
            padding-top: 10px;
            color: black;
        }

        .box ul {
            padding: 0px;
            margin: 0px;
        }


        .box ul li {
            float: left;
            list-style: none;
            width: 190px;
            height: 230px;
            background: white;
            margin: 10px 0px 20px 20px;
            border-radius: 10px;
        }


        .box ul li .item {
            width: 100%;
            height: 50px;
            line-height: 50px;
            background: #143b80;
            text-align: center;
            color: white;
            border-radius: 10px;
            font-size: 25px;
        }

        .box ul li p {
            font-size: 18px;
            color: black;
        }

        .text {
            color: rgb(0, 0, 0);
            font-family: "Russo One", sans-serif;
            font-size: 55px;
            letter-spacing: 9px;
            text-transform: uppercase;
            position: relative;
            padding: 2rem 1rem;
            opacity: 0;
            animation: fadeInText 0s 1.1s both;
        }

        .text-block {
            position: relative;
            overflow: hidden;
            margin-left: 300px;
            text-align: center;
        }

        .text-block:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #0084ff;
            transform: translateX(-100%);
            animation: enlargeBlock 0.5s 0.6s both, revealBlock 0.5s 1.1s both;
        }

        @keyframes fadeInText {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes enlargeBlock {
            from {
                width: 0%;
            }

            to {
                width: 100%;
            }
        }

        @keyframes revealBlock {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(100%);
            }
        }
    </style>

    <meta http-equiv="refresh" content="5;home.php"/>
</head>

<body>
    <div class="sidenav">
        <div class="container">
            <img src="volkswagen.png" alt="Logo Volks" style="width:100px;height:100px;">
            <p>MbO</p>
        </div>
        <a href="home.php">Ciclos</a>
        <a href="#services">Cadastrar empregados</a>
        <a href="#clients">Extrair Relatório</a>

        <div class="btn-sair">
            <p><a href="logout.php">Sair</a></p>
        </div>
    </div>

    <div>
        <div class="text-block">
            <h1 class="text"><?php echo "Seja bem vindo $nome"; ?></h1>
        </div>
    </div>


</body>

</html>