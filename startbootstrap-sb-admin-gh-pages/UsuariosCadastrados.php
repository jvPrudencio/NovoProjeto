<?php
include 'conexaoBanco.php';

$sql_code = "SELECT * FROM projeto";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
$linha = $sql_query->fetch_assoc();
?>

<h1>Usuarios Cadastrados</h1>
<a href="formularioCadastro.php">Cadastro de usuarios</a>
<table>
    <tr>
        <td>Nome</td>
        <td>E-mail</td>
        <td>CEP</td>
        <td>Endereço</td>
        <td>Bairro</td>
        <td>Localidade</td>
    </tr>
<?php
do{
?>
    <tr>
        <td><?php echo $linha['nome']; ?></td>
        <td><?php echo $linha['email']; ?></td>
        <td><?php echo $linha['cep']; ?></td>
        <td><?php echo $linha['endereco']; ?></td>
        <td><?php echo $linha['bairro']; ?></td>
        <td><?php echo $linha['localidade']; ?></td>
        <td>
            <a href="formularioCadastro.php <?php echo $linha['id']; ?>">Editar</a>
            <a href="formularioCadastro.php <?php echo $linha['id']; ?>">Deletar</a>
        </td>
    </tr>
<?php } while($linha = $sql_query -> fetch_assoc()); ?>
</table>
    
    



