<?php
    session_start();
    $dados=$_SESSION["dados2A"];
    include("../config/dados.php");

    

    $id=$_GET["id"];
    

    $cont= array_search( $id, array_column($dados,"IDres"));
    $_SESSION["update"]=$id;
    

    $info=$dados[$cont];
    
   
    $res=upGet($id);
    



?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <Link type="text/css" href="../regis/regi.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../regis/regi.js"></script>
</head>
<body>
    <main class="corpo">
        <main class="formulary">
            
            <a href="../index.php">Voltar</a></br>
            <?php 
            
            echo("
                <section class=img>
                    <img class=image src=../fotos/" .$res["img"]. ">
                </section>
            ");
            
            
            
            ?>

            <form class="form" action="upDatabase.php" method="POST" enctype="multipart/form-data">
                <!--
                    <label for="Item">Item</label><br/>
                    
                    <input type="text" name="Item" id="Item" required class="input"  >
                    <br/>
                    
                    <label for="Titulo">Titulo</label><br/>
                    <input type="text" name="Titulo" id="Titulo" required class="input"  > 
                    <br/>

                    <label for="Descriçao">Descriçao</label><br/>
                    <textarea rows="10" cols="30" name="Descricao" id="desc" >

                    </textarea><br/>
                    
                    

                    <label for="img">Image</label> <br/>
                    <input type="file" name="img" id="img"><br/>
                -->
                <?php
                    
                    echo("
                        <label for=Item>Item</label><br/>
                        <input type=text name=Item id=Item class=input value=". $res["Item"] .">
                        <br/>
                        
                        <label for=Titulo>Titulo</label><br/>
                        <input type=text name=Titulo id=Titulo class=input value=". $res["Titulo"] ."> 
                        <br/>

                        <label for=Descriçao>Descrição</label><br/>
                        <textarea rows=10 cols=30 name=Descricao id=desc >". $res["descricao"] ."</textarea><br/>
                        
                        

                        <label for=img>Image</label> <br/>
                        <input type=file name=img id=img required><br/>
                    ");

                ?>

                <input type="submit" value="enviar" class="enviar">

            </form>
        </main>
    </main>
    
</body>