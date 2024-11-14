<?php
    
    //importando as dependencias do documento dados.php
    include_once("../config/dados.php");
    session_start();
    $Nalto=$_POST["Nome_do_autor"];
    $Gitulo=$_POST["Titulo_do_Livro"];
    $genero=$_POST["Genero_do_livro"];
    $Status=$_POST["statu_atual_do_livro"];
    
    //diretorio do arquivo fotos
    $dirFoto= "../fotos/";
    
    //buscando mais informaçoes 
    $dados=getUpdate($id);


    $file=$dirFoto.basename($_FILES["img"]["name"]);
    //verifica se a imagem existe
    if(file_exists($dados["img"])){
        //verifica se e uma imagen
        if(getimagesize($_FILES["img"]["tmp_name"])){
            //exclui a imagen anterior
            if(unlink( $dados["img"] ) ){
                echo("</br>excluido");
                
                //salva a imagen no arquivo fotos
                if(move_uploaded_file($_FILES["img"]["tmp_name"],$file)){
                    //atualiza o resto da informação no DB
                    echo("</br>Foto atualizado");
                    
                    if(update($id,$img,$getero,$Tlivro,$sinopse,$Nalto,$Status)){
                        echo("</br>atualizado o bancod e dados");
                        //sleep(20);
            
                        session_destroy();
                        echo("</br>sessao finalizada");
                        
                        //header("location:../index.php");
                    }

                }else{
                    die("</br>erro no upload da imagen");
                    
                }
            }else{
                die("</br>erro na substituição da imagen");
              
            }
        }else{
        echo("</br>não á imagen");
        }
    }else{
        //verifica se e uma imagen
        echo("</br>segunda entrada");
        
        if(getimagesize($_FILES["img"]["tmp_name"])){
            if(move_uploaded_file($_FILES["img"]["tmp_name"],$file)){
                echo("</br>Adicionado a foto");
                
                 //atualiza o resto da informação no DB
                 if(update($id,$img,$getero,$Tlivro,$sinopse,$NAutor,$status )){
                    echo("</br>salvo no bancod e dados");
                    //sleep(20);
                    session_destroy();
                    echo("</br>sessao finalizada");
                    

                    //header("location:../index.php");
                }
            }else{
                echo("erro no upload da imagen");
            }
        }
    }





?>