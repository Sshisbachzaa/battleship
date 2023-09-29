<?php

include 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$mail = $_POST['mail'];
$telefone = $_POST['telefone'];
$uf = $_POST['estado'];
$arquivo = $_FILES['fotoatualizada'];





if($arquivo !== null) {
    preg_match("/\.(png|jpg|jpeg|jfif){1}$/i", $arquivo["name"],$ext);

    if($ext == true) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_arquivo = "imagens/".$nome_arquivo;
        move_uploaded_file($arquivo['tmp_name'],$caminho_arquivo);

        $sql = "UPDATE `cliente` SET `nome`='$nome',`email`='$mail',`telefone`='$telefone',`estado`='$uf',imagem='$nome_arquivo' WHERE id_cliente = $id";
        $inserir = mysqli_query($conexao,$sql);

    }
} else {
    $sql = "UPDATE `cliente` SET `nome`='$nome',`email`='$mail',`telefone`='$telefone',`estado`='$estado' WHERE id_cliente = $id";
    $inserir = mysqli_query($conexao,$sql);
}



header('Location: formCliente.php?msg=1');



?>
