<?php
    include "dados.php";

    $Nome = $_POST["Nome"];
    $DTNascimento = $_POST["DTNasc"];
    $Sexo = $_POST["Sexo"];
    $CPF = $_POST["CPF"];
    $Telefone = $_POST["Telefone"];
    $Endereco = $_POST["Endereço"];
    $email = $_POST["Email"];
    $Senha = $_POST["Senha"];
    $ConfirmarSenha = $_POST["ConfirmarSenha"];

    if ($Senha == $ConfirmarSenha){
    dados( $Nome, $DTNascimento, $Sexo,  $CPF, $Telefone, $Endereco, $email, $Senha);
}
    else{
        echo ("Senha errada");
    }
?>