<?php
$servername = "sql313.ezyro.com";
$username = "ezyro_42246583";
$password = "6bf9340ff4ec2";
$dbname = "ezyro_42246583_saudeanimal";

$conexao = new mysqli($servername, $username, $password, $dbname);

$conexao->set_charset("utf8mb4");

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>