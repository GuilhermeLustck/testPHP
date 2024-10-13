<?php

//documento responsavel pelas funcoes de todo projeto envolvendo banco de dados ou dados

    function get(){
        
        include_once("config.php");

        global $CONECT;

        $SQL=$CONECT->prepare("SELECT * FROM registro");
        $SQL->execute();

        $result=$SQL->fetchALL(PDO::FETCH_ASSOC);

        return $result;

    }

    function upGet($id){
        include_once("config.php");

        
        //consulta usuario com base no Id do mesmo
        $DQL=$CONECT->prepare("SELECT * FROM registro WHERE IDres=:ID");
        $DQL->bindvalue( ":ID", $id ,PDO::PARAM_INT );
        $DQL->execute();

        return $result=$DQL->fetch(PDO::FETCH_ASSOC);

    }
    
    function update($id,$img,$item,$titulo,$descricao ){
        //importa a conexao com o db
        include_once("config.php");

        
        //consulta
        if ($CONECT === null) {
            die("Erro na conexão com o banco de dados.");
        }

        //requisição ao banco de dados
        $sql=$CONECT->Prepare("UPDATE registro SET Item=:item, Titulo=:titulo, descricao=:descricao, img=:imagen  WHERE IDres=:ID");
        $sql->bindvalue(":ID",$id,PDO::PARAM_INT);
        $sql->bindvalue(":item",$item,PDO::PARAM_STR);
        $sql->bindvalue(":titulo",$titulo,PDO::PARAM_STR);
        $sql->bindvalue(":descricao",$descricao,PDO::PARAM_STR);
        $sql->bindvalue(":imagen",$img,PDO::PARAM_STR);
        $sql->execute();
        return $sql->execute();
        


    }

    function objJson($id){
        $dados=$_SESSION["dados2A"];
        
        foreach($dados as $json){

            if($json["IDres"]==$id){
                print_r($json);
                return $json;
            }

        }

    }
    function usuario($id){
        include_once("config.php"); 

        $sql=$CONECT->prepare("SELECT DTNasc,Ender,Tel,Email,Nome FROM usuario WHERE ID=:id ");
        $sql->bindvalue(":id",$id,PDO::PARAM_INT);
        $sql->execute();
        $result=$sql->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    
?>