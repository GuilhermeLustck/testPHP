<?php
    include_once("../config/config.php");

    $Nalto=$_POST["Nome_do_autor"];
    $Titulo=$_POST["Titulo_do_Livro"];
    $Genero=$_POST["Genero_do_livro"];
    $Status=$_POST["statu_atual_do_livro"];
    $Sinopse=$_POST["Sinopse"];

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
                header("location:../index.php");

            }else{

                $_SESSION["status"]="imagem nao salva";

            }
        }else{

            $_SESSION["status"]="NAO A FOTOS";

        }

        
    }else{
        $_SESSION["status"]="imagem e dados não foram salvos";
    }
    

    function res($Nalto,$Titulo,$Genero,$Status,$Sinopse,$img,$ID){
        include_once("config.php");

        global $CONECT;

        $SQLI= $CONECT->prepare("INSERT INTO registro( Genero, TLivro, NAutor,	Sinopse, imagen, status_Do_L ,IDUser )
         VALUES( :Gemero ,:TLivro , :Sinopse ,:autor, :img ,:statu,:ID )");

        $SQLI->bindvalue( ":autor", $Nalto, PDO::PARAM_STR );
        $SQLI->bindvalue( ":TLivro", $Titulo, PDO::PARAM_STR );
        $SQLI->bindvalue( ":Gemero", $Genero, PDO::PARAM_STR );
        $SQLI->bindvalue( ":statu", $Status, PDO::PARAM_STR );
        $SQLI->bindvalue( ":Sinopse ", $Sinopse, PDO::PARAM_STR );
        $SQLI->bindvalue( ":ID ", $ID, PDO::PARAM_INT );
        $SQLI->bindvalue( ":img", $img, PDO::PARAM_STR );
        $SQLI->execute();

        $result=$SQLI->fetch(PDO::FETCH_ASSOC);

        if(!$result){
            return false;
        }else{
            return true;
        };



    };
    
    
?>