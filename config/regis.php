<?php
    include_once("config.php");

    $item  = $_POST["Item"];
    $titulo= $_POST["Titulo"];
    $desc  = $_POST["Descricao"];

    $img=basename($_FILES["img"]["name"]);

    echo($img."</br>");
    echo($item ."</br>");
    echo($titulo."</br>");
    echo($desc."</br>");

    if( !res($item,$titulo,$desc,$img) ){

        $dirFoto= "../fotos/";
        $dirFILE= $dirFoto.basename($_FILES['img']['name']);

        
        $veri = getimagesize($_FILES["img"]["tmp_name"]);

        if($veri){
            if(move_uploaded_file($_FILES["img"]["tmp_name"],$dirFILE)){

                echo("arquivo". htmlspecialchars(basename($_FILES["img"]["name"])). "foi enviado com sucesso");
                
                header("location:../index.html");

            }else{

                echo("imagem nao salva");

            }
        }else{

            echo("NAO A FOTOS");

        }

        
    }else{
        echo("imagem e dados nao foram salvos");
    }
    

    function res($item,$titulo,$desc,$img){
        include_once("config.php");

        global $CONECT;

        $SQLI= $CONECT->prepare("INSERT INTO registro( Item, Titulo, descricao, img ) VALUES( :item, :titulo, :desccao, :img )");

        $SQLI->bindvalue( ":item", $item, PDO::PARAM_STR );
        $SQLI->bindvalue( ":titulo", $titulo, PDO::PARAM_STR );
        $SQLI->bindvalue( ":desccao", $desc, PDO::PARAM_STR );
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