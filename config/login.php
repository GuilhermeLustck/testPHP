<?php 
     include "dados.php";

     $email=$_POST["email"];
     $senha=$_POST["senha"];

     login($email,$senha);



?>