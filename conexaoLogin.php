<?php
session_start();
include 'conexaoCadastro.php';

$email=$_POST['email_login'];
$senha=$_POST['senha_login'];

$login = "SELECT * FROM projeto WHERE email= '$email' AND senha= '$senha'";
$result= $cone->query($login);

if($result->num_rows>0){
    $_SESSION['email_login']=$email;
    $_SESSION['senha_login']=$senha;
    header('location:PrimeiraPagina.php');
}
else{
    echo alert("Dados invalidos");
}
