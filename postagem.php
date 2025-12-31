<?php
session_start();
require "db.php";
if($_SESSION['role'] != 'admin') die("Sem permissão");
$id = $_POST['excluirNoticia'];
$sql = $conn->prepare("DELETE FROM noticias WHERE id=?");
$sql->bind_param("i",$id);
$sql->execute();
header("Location: index.php");
?>