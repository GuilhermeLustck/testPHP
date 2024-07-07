$(document).ready(()=>{
    $("#registrar").click(()=>{

        window.location.assign("regis/regi.html")
        
    })
})


$(document).ready(()=>{
    console.log("ajax")
    $.ajax({
        url:"http://localhost/testPHP/config/dados.php",
        dataType:'json',
        cache: false,
    }).done(function(result){
        
        if(result){
            //console.log(result)
            let contador=0;
            console.log(contador)

            for(let i=0; i<result.length;i++){
                
                if(contador==0){
                    console.log("primeira section")
                    $(".conteudo").prepend(`<section class="items">`);
                }
                
                $(".conteudo").prepend("<section class=cont> <img class=image src=fotos/"+result[i].img+" > </br>  <section><h3>"+ result[i].Titulo+" </h3><p> "+result[i].Item+" </p><p>"+ result[i].descricao+" </p></section> <button class=button  click=edit() >Editar</button></section>");
                console.log(contador)
                
                if(contador==3){
                    console.log("segunda section")

                    $(".conteudo").prepend(``);

                    contador=0;
                }

                contador++;
            }


        }else{
            $("#erro").html("falha na conecção");
        }
    })



})


function edit(id){

    console.log("id do usuarion"+"  "+id)
    alert("id do usuarion"+"  "+id)

}