<?php
    session_start()
    //importando as dependencias do documento dados.php
    include("../config/dados.php");

    $item=$_POST["item"];
    $titulo=$_POST["titulo"];
    $descricao=$_POST["Descricao"];
    //diretorio do arquivo fotos
    $dirFoto= "../fotos/";

    $file=$dirFoto.basename($_FILES["img"]["name"]);
    //verifica se a imagem existe
    if(file_exists($file)){
        //verifica se e uma imagen
        if(getimagesize($_FILES["img"]["tmp_name"])){
            //exclui a imagen anterior
            if(unlink($file)){
                //salva a imagen no arquivo fotos
                if(move_uploaded_file($_FILES["img"]["tmp_name"],$file)){
                    //atualiza o resto da informação no DB
                    if(update($id,$file,$item,$titulo,$descricao)){
                        header("location:../index.php");
                    }

                }else{
                    echo("erro no upload da imagen");
                }
            }else{
                echo("erro na substituição da imagen");
            }
        }else{
        echo("não á imagen");
        }
    }else{
        //verifica se e uma imagen
        if(getimagesize($_FILES["img"]["tmp_name"])){
            if(move_uploaded_file($_FILES["img"]["tmp_name"],$file)){
                 //atualiza o resto da informação no DB
                 if(update($id,$file,$item,$titulo,$descricao)){
                    header("location:../index.php");
                }
            }else{
                echo("erro no upload da imagen");
            }
        }
    }




//
?>