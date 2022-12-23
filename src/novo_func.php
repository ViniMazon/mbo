<?php
session_start();
ob_start();

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
      background-color: #D6DCE5;
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
  </style>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

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

  <div class="corpo">

    <table>
      <form action="" method="post">

        <label>Nome:</label>
        <input type="text" name="">

        <label>Sobrenome:</label>
        <input type="text" name="">

        <label>N° de chapa:</label>
        <input type="text" name="">

        <label>Senha:</label>
        <input type="text" name="">

        <label>Confirmar senha:</label>
        <input type="text" name="">

        <label>Gestor:</label>
        <select>
          <?php

          $result_gestores = "SELECT cod_gestor, nome FROM gestor";
          $resultado_gestores = mysqli_query($conn, $result_gestores);
          ?>
            <option value='' selected disabled>Selecione o gestor:</option>

            <?php

            while ($row_ano = mysqli_fetch_assoc($resultado_ano)) { ?>
              <option value="<?php echo $row_ano['ano']; ?>"><?php echo $row_ano['ano']; ?></option>
            <?php }
          ?>
            <option value="<?php echo $ciclo_ano; ?>" selected><?php echo $ciclo_ano; ?></option>

            <?php
            while ($row_ano = mysqli_fetch_assoc($resultado_ano)) { ?>

              <option value="<?php echo $row_ano['ano']; ?>"><?php echo $row_ano['ano']; ?></option>
          <?php
          }
          ?>
        </select>
      </form>

    </table>

  </div>

</body>

</html>