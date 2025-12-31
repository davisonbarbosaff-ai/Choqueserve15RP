<?php
session_start();
require "db.php";
if($_SESSION['role'] != 'admin') die("Sem permissão");
$id     = $_POST['id'];
$status = $_POST['status'];
$cargo  = $_POST['cargo'] ?? null;
if($cargo){
    $sql = $conn->prepare("UPDATE inscricoes SET status=?, cargo=? WHERE id=?");
    $sql->bind_param("ssi",$status,$cargo,$id);
} else {
    $sql = $conn->prepare("UPDATE inscricoes SET status=? WHERE id=?");
    $sql->bind_param("si",$status,$id);
}
$sql->execute();
header("Location: index.php");
?>