<?php
if ( $_SESSION['logado'] != true ) {
 header('location: /SCC/paginas/login.php');
}