<?php
    include_once("../config/config.php");
    include("../config/dados.php");
    session_start();
    $Nalto=$_POST["Nome_do_autor"];
    $Titulo=$_POST["Titulo_do_Livro"];
    $Genero=$_POST["Genero_do_livro"];
    $Status=$_POST["statu_atual_do_livro"];
    $Sinopse=$_POST["Sinopse"];
    $ID=$_SESSION["id"];

    //pega o nome da imagem
    $img=basename($_FILES["img"]["name"]);
    
    //add no banco de dados
    if( res($Nalto,$Titulo,$Genero,$Status,$Sinopse,$img,$ID) ){
        session_start();
        $dirFoto= "../fotos/";
        $dirFILE= $dirFoto.basename($_FILES['img']['name']);

        
        $veri = getimagesize($_FILES["img"]["tmp_name"]);
        //verifica se á uma imagen
        if($veri){
            //salva a imagen no arquivo fotos
            if(move_uploaded_file($_FILES["img"]["tmp_name"],$dirFILE)){
                $_SESSION["status"]= "Imagem". htmlspecialchars(basename($_FILES["img"]["name"])). "foi enviado com sucesso";

                //o usuario retorna para o index
                header("location:../principal/index.php");

            }else{

                $_SESSION["status"]="imagem nao salva";
                print_r($_SESSION);
            }
        }else{

            $_SESSION["status"]="NAO A FOTOS";
            print_r($_SESSION);


        }

        
    }else{
        $_SESSION["status"]="imagem e dados não foram salvos";
        print_r($_SESSION);

    }
    

    function res($Nalto,$Titulo,$Genero,$Status,$Sinopse,$img,$ID){
        include_once("../config/config.php");

        global $CONECT;

        $SQLI= $CONECT->prepare("INSERT INTO registro (Genero, TLivro, Sinopse, NAutor, imagen, status_Do_L, IDUser)
VALUES (:Genero, :TLivro, :Sinopse, :autor, :img, :statu, :IDUser)");
    try {
        $SQLI->bindValue(":autor", $Nalto, PDO::PARAM_STR);
        $SQLI->bindValue(":TLivro", $Titulo, PDO::PARAM_STR);
        $SQLI->bindValue(":Genero", $Genero, PDO::PARAM_STR);
        $SQLI->bindValue(":statu", $Status, PDO::PARAM_STR);
        $SQLI->bindValue(":Sinopse", $Sinopse, PDO::PARAM_STR);
        $SQLI->bindValue(":IDUser", $ID, PDO::PARAM_INT);
        $SQLI->bindValue(":img", $img, PDO::PARAM_STR);
        $SQLI->execute();

        $result=$SQLI->fetch(PDO::FETCH_ASSOC);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
        

        



    };
    
    
?>