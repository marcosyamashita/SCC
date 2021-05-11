<?php
/**
 * Created by PhpStorm.
 * User: marcos.pereira
 * Date: 07/01/2019
 * Time: 21:44
 */

include ('conexao.php');

class setorDAO
{
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function exibirSetores() {
        $conexao = mysqli_connect('mariadb.crediembrapa.com.br', 'contratos', 'contratos2020', 'contratos');
        $query = "SELECT * FROM `setores`";
        $resultado = mysqli_query($conexao, $query);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        }else{
            return false;
        }
    }

}