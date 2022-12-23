<?php
session_start();

include("conexao.php");

$item = filter_input_array(INPUT_POST, FILTER_DEFAULT);

foreach ($item['ano'] as $cod_ciclo => $ano) {
    echo "Id do produto: $cod_ciclo <br>";
    echo "categoria: $ano <br>";

    $query_ano = "UPDATE ciclo SET ano=:ano WHERE id=:cod_ciclo";
    $up_item1 = $conn_PDO->prepare($query_ano);
    $up_item1->bindParam(':ano', $ano);
    $up_item1->bindParam(':cod_ciclo', $cod_ciclo);
    $up_item1->execute();
}

foreach ($item['categoria'] as $item_id => $categoria) {
    echo "Id do produto: $item_id <br>";
    echo "categoria: $categoria <br>";

    $query_item = "UPDATE item SET categoria=:categoria WHERE cod_item=:item_id";
    $up_item1 = $conn_PDO->prepare($query_item);
    $up_item1->bindParam(':categoria', $categoria);
    $up_item1->bindParam(':item_id', $item_id);
    $up_item1->execute();
}

foreach ($item['objetivo'] as $item_id => $objetivo) {
    echo "Id do produto: $item_id <br>";
    echo "objetivo: $objetivo <br>";

    $query_item = "UPDATE item SET objetivo_mensuravel=:objetivo WHERE cod_item=:item_id";
    $up_item2 = $conn_PDO->prepare($query_item);
    $up_item2->bindParam(':objetivo', $objetivo);
    $up_item2->bindParam(':item_id', $item_id);
    $up_item2->execute();
}

foreach ($item['campo_acao'] as $item_id => $campo_acao) {
    echo "Id do produto: $item_id <br>";
    echo "Campo Ação: $campo_acao <br>";

    $query_item = "UPDATE item SET campo_acao=:campo_acao WHERE cod_item=:item_id";
    $up_item2 = $conn_PDO->prepare($query_item);
    $up_item2->bindParam(':campo_acao', $campo_acao);
    $up_item2->bindParam(':item_id', $item_id);
    $up_item2->execute();
}

foreach ($item['prazo'] as $item_id => $prazo) {
    echo "Id do produto: $item_id <br>";
    echo "Prazo: $prazo <br>";

    $query_item = "UPDATE item SET prazo=:prazo WHERE cod_item=:item_id";
    $up_item2 = $conn_PDO->prepare($query_item);
    $up_item2->bindParam(':prazo', $prazo);
    $up_item2->bindParam(':item_id', $item_id);
    $up_item2->execute();
}

foreach ($item['peso'] as $item_id => $peso) {
    echo "Id do produto: $item_id <br>";
    echo "peso: $peso <br>";

    $query_item = "UPDATE item SET peso=:peso WHERE cod_item=:item_id";
    $up_item2 = $conn_PDO->prepare($query_item);
    $up_item2->bindParam(':peso', $peso);
    $up_item2->bindParam(':item_id', $item_id);
    $up_item2->execute();
}

foreach ($item['status'] as $item_id => $status) {
    echo "Id do produto: $item_id <br>";
    echo "status: $status <br>";

    $query_item = "UPDATE item SET status=:status WHERE cod_item=:item_id";
    $up_item3 = $conn_PDO->prepare($query_item);
    $up_item3->bindParam(':status', $status);
    $up_item3->bindParam(':item_id', $item_id);
    $up_item3->execute();
}

foreach ($item['implementacao'] as $item_id => $implementacao) {
    echo "Id do produto: $item_id <br>";
    echo "implementacao: $implementacao <br>";

    $query_item = "UPDATE item SET implementacao=:implementacao WHERE cod_item=:item_id";
    $up_item3 = $conn_PDO->prepare($query_item);
    $up_item3->bindParam(':implementacao', $implementacao);
    $up_item3->bindParam(':item_id', $item_id);
    $up_item3->execute();
}

if (isset($_POST['novo_i'])) {

    $cod_ciclo = $_SESSION['cod_ciclo'];

    $ni = "INSERT INTO item (id)
    VALUES ($cod_ciclo)";

    $criar_i = mysqli_query($conn, $ni);

    header("Location:novociclo.php");
}

if (isset($_POST['finalizar'])) {

    header("Location:home.php");
}

if (isset($_POST['excluir'])) {

    foreach ($item['excluir'] as $item_id => $excluir) {

        echo "<hr>";

        $query_item = "DELETE FROM item WHERE cod_item=:item_id";
        $up_item3 = $conn_PDO->prepare($query_item);
        $up_item3->bindParam(':item_id', $item_id);
        $up_item3->execute();
    }

    header("location:novociclo.php");
}