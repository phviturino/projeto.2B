<?php
$servername = "192.168.56.102"; // IP do Servidor XAMPP
$username = "pedro";
$password = "140823pl";
$dbname = "saudeanimal";
// Criar conexão usando MySQLi
$conexao = new mysqli($servername, $username, $password, $dbname);
// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
echo "Conectado com sucesso ao banco externo!";
?>