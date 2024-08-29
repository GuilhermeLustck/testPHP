<?php
    
    //importando as dependencias do documento dados.php
    include_once("../config/dados.php");
    session_start();
    $item=$_POST["Item"];
    $titulo=$_POST["Titulo"];
    $descricao=$_POST["Descricao"];
    $id=$_SESSION["update"][0];
    //diretorio do arquivo fotos
    $dirFoto= "../fotos/";
    
    //buscando mais informaçoes 
    $dados=objJson($id);

    print_r($dados);

    $file=$dirFoto.basename($_FILES["img"]["name"]);
    //verifica se a imagem existe
    if(file_exists(json_decode($file)) || file_exists($dados["img"])){
        //verifica se e uma imagen
        if(getimagesize($_FILES["img"]["tmp_name"])){
            //exclui a imagen anterior
            if(unlink( $dados["img"] ) ){
                echo("excluido");
                //salva a imagen no arquivo fotos
                if(move_uploaded_file($_FILES["img"]["tmp_name"],$file)){
                    //atualiza o resto da informação no DB
                    echo("atualizado a foto");
                    if(update($id,$file,$item,$titulo,$descricao)){
                        echo("atualizado o bancod e dados");
                        session_destroy();
                        echo("sessao finalizada");
                        header("location:../index.php");
                    }

                }else{
                    echo("erro no upload da imagen");
                }
            }else{
                die("erro na substituição da imagen");
              
            }
        }else{
        echo("não á imagen");
        }
    }else{
        //verifica se e uma imagen
        echo("segunda entrada");
        if(getimagesize($_FILES["img"]["tmp_name"])){
            if(move_uploaded_file($_FILES["img"]["tmp_name"],$file)){
                 //atualiza o resto da informação no DB
                 if(update($id,$file,$item,$titulo,$descricao)){
                    session_destroy();
                    header("location:../index.php");
                }
            }else{
                echo("erro no upload da imagen");
            }
        }
    }





?>