<?php
session_start();

include('conexao.php');

$cod = $_SESSION['cod_gestor'];

$cat_ciclo_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$cod_ciclo = $cat_ciclo_id;
$_SESSION['ciclo_id'] = $cat_ciclo_id;

$query_ciclo = "SELECT *
                    FROM item 
                    WHERE id=:cat_ciclo_id";
$result_ciclo = $conn_PDO->prepare($query_ciclo);
$result_ciclo->bindParam(':cat_ciclo_id', $cat_ciclo_id);
$result_ciclo->execute();

$consulta = "SELECT ano FROM ciclo WHERE id=$cat_ciclo_id";
$resultado = mysqli_query($conn, $consulta);

while ($registro = mysqli_fetch_array($resultado)) {
    
    $ciclo_ano = $registro['ano'];
}
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

        .corpo {
            margin-left: 320px;
            margin-right: 18px;
        }

        .container {
            display: flex;
            align-items: center;
        }

        .container,
        p {
            color: white;
            font-size: 50px;
            padding-left: 10px;
            padding-top: 5px;

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

        .circle {
            margin-top: 30px;
            display: flex;
            align-items: center;
            border-radius: 100%;
            border: 8px solid #4472C4;
            width: 30px;
            height: 30px;
            background-color: #D6DCE5;
        }

        .circle select {
            border: none;
            outline: none;
            resize: none;
            background-color: transparent;
            font-size: 35px;
            margin-left: 50px;
        }

        .circle select:hover {
            background-color: #9EB5E1;
        }

        .circle select:focus {
            background-color: #9EB5E1;
        }

        .novo input {
            font-size: 23px;
            background: rgba(143, 170, 220, 255);
            border: none;
            border-radius: 8px;
            padding: 7px;
            padding-left: 35px;
            padding-right: 35px;
            margin-top: -15px;
            cursor: pointer;
            position: absolute;
            right: 25px;
        }

        .novo input:active {
            background: cornflowerblue;
        }

        #box1 {
            border: 2px solid #8FAADC;
            width: auto;
            overflow: hidden;
            background: rgba(180, 199, 231, 255);
            margin-top: 20px;
            border-radius: 10px;
        }

        #box1 hr {
            border: 1px solid #8FAADC;
            margin: 0;
            padding: 0;
        }

        #box1 p {
            font-size: 30px;
            color: #203864;
            margin-top: 20px;
            margin: 0;
            padding: 10px;
        }

        .tabela {
            padding: 8px;
            margin: 0;
            width: 100%;
        }

        .tabela textarea {
            background-color: transparent;
            border: none;
            outline: none;
            resize: none;
            font-size: 15px;
            height: auto;
        }

        .tabela textarea:hover {
            background-color: #9EB5E1;
        }

        .tabela textarea:focus {
            background-color: #9EB5E1;
        }

        .tabela textarea::-webkit-scrollbar {
            width: 3px;
        }

        .tabela textarea::-webkit-scrollbar-thumb {
            background-color: #0B8FF9;
        }

        .tabela input {
            background-color: transparent;
            border: none;
            outline: none;
            resize: none;
            font-size: 15px;
        }

        .tabela input:hover {
            background-color: #9EB5E1;
        }

        .tabela input:focus {
            background-color: #9EB5E1;
        }

        .tabela select {
            border: none;
            outline: none;
            resize: none;
            background-color: transparent;
            font-size: 15px;
            margin-bottom: 40px;
        }

        .tabela select:hover {
            background-color: #9EB5E1;
        }

        .tabela select:focus {
            background-color: #9EB5E1;
        }

        .top {
            color: #203864;
            font-size: 23px;
        }

        .finalizar input {
            font-size: 23px;
            background: rgba(143, 170, 220, 255);
            border: none;
            border-radius: 8px;
            padding: 7px;
            padding-left: 35px;
            padding-right: 35px;
            margin-top: 15px;
            margin-bottom: 20px;
            cursor: pointer;
            position: absolute;
            right: 25px;
        }

        .finalizar input:active {
            background: cornflowerblue;
        }

        .excluir {
            border: none;
            /*remove as bordas*/
            padding: 0;
            /*remove os espaços*/
            background-color: transparent;
            /*remove o fundo cinza*/

            /*remove a aparência customizada/nativa do navegador*/
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            right: 25px;
            align-items: right;
        }

        .excluir img {
            cursor: pointer;
        }

        .lixeira {
            border: none;
            margin-top: 10px;
            cursor: pointer;
            position: absolute;
            right: 240px;
        }

        .lixeira button {
            border: none;
            /*remove as bordas*/
            padding: 0;
            /*remove os espaços*/
            background-color: transparent;
            /*remove o fundo cinza*/

            /*remove a aparência customizada/nativa do navegador*/
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            right: 25px;
            align-items: right;
        }

        .lixeira img {
            cursor: pointer;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
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
        <form action="ope_ni_editar.php" method="post">
            <div class="circle">
                <select name="ano[<?php echo $cod_ciclo ?>]">
                    <?php

                    $result_ano = "SELECT * FROM anos";
                    $resultado_ano = mysqli_query($conn, $result_ano);

                    if ($ciclo_ano == null) { ?>

                        <option value='' selected disabled>Selecione o ano</option>

                        <?php

                        while ($row_ano = mysqli_fetch_assoc($resultado_ano)) { ?>
                            <option value="<?php echo $row_ano['ano']; ?>"><?php echo $row_ano['ano']; ?></option>
                        <?php }
                    } else { ?>
                        <option value="<?php echo $ciclo_ano; ?>" selected><?php echo $ciclo_ano; ?></option>

                        <?php
                        while ($row_ano = mysqli_fetch_assoc($resultado_ano)) { ?>

                            <option value="<?php echo $row_ano['ano']; ?>"><?php echo $row_ano['ano']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <div class="lixeira">
                    <button type="submit" name="e_ciclo">
                        <img src="lixeira.png" style="width:38px;height:40px;"></a>
                    </button>
                </div>
                <div class="novo">
                    <input type="submit" name="novo_i_e" value="Novo Item +">
                </div>
            </div>

            <?php

            $n = 0;

            while ($row_ciclo = $result_ciclo->fetch(PDO::FETCH_ASSOC)) {

                $n = $n + 1;

                extract($row_ciclo);

            ?>
                <div id='box1'>
                    <table style="width:100%">
                        <tr>
                            <td style="width:97%">
                                <p>Item <?php echo $n ?></p>
                            </td>
                            <td>
                                <button class="excluir" type="submit" name="excluir[<?php echo $cod_item ?>]">
                                    <img src="excluir.png" style="width:36px;height:30px;">
                                </button>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <input type="hidden" name="id_item" value="<?php echo $cod_item ?>">
                    <table class='tabela'>
                        <tr class='top'>
                            <td>Categoria:</td>
                            <td colspan='2'> Objetivo Mensuarável:</td>
                        </tr>
                        <tr>
                            <td> <select name="categoria[<?php echo $cod_item ?>]">
                                    <?php
                                    $result_cat = "SELECT * FROM categorias";
                                    $resultado_cat = mysqli_query($conn, $result_cat);

                                    if ($categoria == null) { ?>

                                        <option value='' selected disabled>Selecione</option>

                                        <?php

                                        while ($row_cat = mysqli_fetch_assoc($resultado_cat)) { ?>
                                            <option value="<?php echo $row_cat['categoria']; ?>"><?php echo $row_cat['categoria']; ?></option>
                                        <?php }
                                    } else { ?>
                                        <option value="<?php echo $categoria; ?>" selected><?php echo $categoria; ?></option>

                                        <?php
                                        while ($row_cat = mysqli_fetch_assoc($resultado_cat)) { ?>

                                            <option value="<?php echo $row_cat['categoria']; ?>"><?php echo $row_cat['categoria']; ?></option>
                                    <?php
                                        }
                                    }


                                    ?>
                                </select>
                            <td colspan='2'>
                                <textarea placeholder='insira o objetivo' cols='50' rows='3' name="objetivo[<?php echo $cod_item ?>]"><?php echo $objetivo_mensuravel; ?></textarea>
                            </td>
                        </tr>
                        <tr class='top'>
                            <td>Campo de ação / Batalha:</td>
                            <td>Prazo:</td>
                            <td>Peso:</td>
                        </tr>
                        <tr>
                            <td>
                                <input type='text' size='30px' placeholder='insira o campo de ação' name="campo_acao[<?php echo $cod_item ?>]" value="<?php echo $campo_acao; ?>">
                            </td>
                            <td>
                                <input type='date' name="prazo[<?php echo $cod_item ?>]" value="<?php echo $prazo; ?>">
                            </td>
                            <td>
                                <input type='text' size='5px' placeholder='ex: 0.5' name="peso[<?php echo $cod_item ?>]" value="<?php echo $peso; ?>">
                            </td>
                        </tr>
                        <tr class='top'>
                            <td>Status:</td>
                            <td colspan='2'>Implementação:</td>
                        </tr>
                        <tr>
                            <td>
                                <input type='text' size='30px' placeholder='Insira o status do item' name="status[<?php echo $cod_item ?>]" value="<?php echo $status; ?>">
                            </td>
                            <td colspan='2'>
                                <input type='text' size='30px' placeholder='Insira como será a implentação' name="implementacao[<?php echo $cod_item ?>]" value="<?php echo $implementacao; ?>">
                            </td>
                        </tr>
                    </table>
                </div>
            <?php } ?>

            <div class="finalizar">
                <input type="submit" name="finalizar" value="Salvar e sair">
            </div>
        </form>


    </div>
</body>

</html>