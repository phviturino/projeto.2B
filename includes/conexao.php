<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saudeanimal";

$conexao = new mysqli($servername, $username, $password, $dbname);

$conexao->set_charset("utf8mb4");

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>