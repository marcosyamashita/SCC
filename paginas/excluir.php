<?php
$id = $_POST["id"];
$conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
$delete = "DELETE FROM `contratos` WHERE `contratos`.`contrato_id` = {$id}";
mysqli_query($conexao, $delete);

header("Location: listar.php?excluido=ok");