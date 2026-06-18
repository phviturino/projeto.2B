<?php
$servername = "192.168.56.102";
$username = "pedro";
$password = "140823pl";
$dbname = "saudeanimal";

$conexao = new mysqli($servername, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>