<?php
$servername = "10.10.93.16"; // IP do Servidor XAMPP
$username = "pedro";
$password = "140823pl";
$dbname = "saudeanimal";
// Criar conexão usando MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
echo "Conectado com sucesso ao banco externo!";
?>