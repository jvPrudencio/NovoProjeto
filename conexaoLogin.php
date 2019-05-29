<?php
session_start();
include 'conexaoBanco.php';

$email=$_POST['email_login'];
$senha=$_POST['senha_login'];

$login = "SELECT * FROM projeto WHERE email= '$email' AND senha= '$senha'";
$result= $conecta->query($login);

if($result->num_rows>0){
    $_SESSION['email_login']=$email;
    $_SESSION['senha_login']=$senha;
    header('location: Pagina2.php');
}
else{
    echo alert("Dados invalidos");
}

