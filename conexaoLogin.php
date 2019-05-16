<?php
session_start();
include 'conexaoCadastro.php';

$email=$_POST['email'];
$senha=$_POST['senha'];

$login = "SELECT * FROM projeto WHERE email= '$email' AND senha= '$senha'";
$result= $cone->query($login);

if($email->num_rows>0){
    $_SESSION['email']='email';
    $_SESSION['senha']='senha';
    header('location:PrimeiraPagina.php');
}
else{
    echo alert("Dados invalidos");
}
