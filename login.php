<?php
session_start();
require "db.php";
$nome = $_POST['nome'];
if(!$nome){ header("Location: index.php"); exit; }
$nomeLower = strtolower($nome);
$adms = ['subbarbosa','ana','paivaz'];
$sql = $conn->prepare("SELECT * FROM usuarios WHERE nome = ?");
$sql->bind_param("s",$nome);
$sql->execute();
$result = $sql->get_result();
if($result->num_rows == 0){
    $role = in_array($nomeLower,$adms)?'admin':'user';
    $insert = $conn->prepare("INSERT INTO usuarios (nome, role) VALUES (?,?)");
    $insert->bind_param("ss",$nome,$role);
    $insert->execute();
    $_SESSION['nome'] = $nome;
    $_SESSION['role'] = $role;
} else {
    $row = $result->fetch_assoc();
    $_SESSION['nome'] = $row['nome'];
    $_SESSION['role'] = $row['role'];
}
header("Location: index.php");
?>