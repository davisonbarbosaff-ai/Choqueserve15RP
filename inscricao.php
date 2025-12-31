<?php
session_start();
require "db.php";
$nome   = $_POST['nome'];
$id_rp  = $_POST['id_rp'];
$motivo = $_POST['motivo'];
$cargo  = "SOLDADO";
$status = "Em análise";
$data   = date("Y-m-d H:i:s");
$sql = $conn->prepare("INSERT INTO inscricoes (nome, id_rp, motivo, cargo, status, data_enviado) VALUES (?,?,?,?,?,?)");
$sql->bind_param("ssssss",$nome,$id_rp,$motivo,$cargo,$status,$data);
$sql->execute();
header("Location: index.php");
?>