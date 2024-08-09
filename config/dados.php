<?php

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
        //consulta
        $query="UPDATE  registro SET Item=:item, Titulo=:titulo, descricao=:descricao, img=:imagen  WHERE IDres=:ID" ;

        //requisição ao banco de dados
        $sql=$CONECT->prepare($query);
        $sql->bindvalue(":ID",$id,PDO::PARAM_INT);
        $sql->bindvalue(":item",$item,PDO::PARAM_STR);
        $sql->bindvalue(":titulo",$titulo,PDO::PARAM_STR);
        $sql->bindvalue(":descricao",$descricao,PDO::PARAM_STR);
        $sql->bindvalue(":imagen",$img,PDO::PARAM_STR);
        $sql->execute();
        return $sql;
        


    }



       ?>