<?php

$servidor = "localhost";
$nome = "root";
$senha = "";
$banco = "projetoo_banco";
$conecta = new mysqli($servidor, $nome, $senha, $banco);
 if($conecta->connect_error){
  die("Conexão falhou: " .$conecta->connect_error."<br>");
  }
  echo "conexão realiza com sucesso"; 
$nome = $_POST["nome_cad"];
$email = $_POST["email_cad"];
$senha = $_POST["senha_cad"];
$cep = $_POST["cep_cad"];
$endereco = $_POST["endereco_cad"];
$bairro = $_POST["bairro_cad"];
$localidade = $_POST["localidade_cad"];

$sql = "INSERT INTO projeto(nome, email, senha, cep, endereco, bairro, localidade)
    VALUES ('$nome', '$email', '$senha', '$cep', '$endereco', '$bairro', '$localidade');";
if ($conecta->multi_query($sql) === TRUE) {
    echo "Cadastrado com sucesso!!<br>";
} else {
    echo "Erro:" . $sql . "<br>" . $conecta->error . "<br>";
}
$conecta->close();
