<?php
session_start();
require "db.php";
if($_SESSION['role'] != 'admin') die("Sem permissão");
$titulo = $_POST['titulo'];
$texto  = $_POST['texto'];
$img    = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
$data   = date("Y-m-d H:i:s");
$sql = $conn->prepare("INSERT INTO noticias (titulo, texto, imagem, data_publicacao) VALUES (?,?,?,?)");
$sql->bind_param("ssss",$titulo,$texto,$img,$data);
$sql->execute();
header("Location: index.php");
?>