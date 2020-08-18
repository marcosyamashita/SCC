<?php
$arquivo = $_POST["arquivo"];
$id = $_POST["id"];
echo unlink($arquivo);
echo '<meta http-equiv="refresh" content="0;url=contrato.php?id=' . $id .'" />';