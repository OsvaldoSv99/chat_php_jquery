   // Scroll al fondo
    var cont=0;
var timer = setInterval(function() {
$('.div_chat').scrollTop( $('.div_chat').prop('scrollHeight') );
if (cont != 0) clearInterval(timer);
cont+=1;
}, 600);

  // Funcion para cuando el scroll este hasta el fondo
  setInterval(esElFinal, 1000);
  function esElFinal() {
    let element = document.getElementById("div_chat");
    if (element.offsetHeight + element.scrollTop >= element.scrollHeight) {
      // Cuando este hasta el fondo del contenedor, la imagen desaparece
      document.getElementById("flechas").style.display="none";
    }else{
      // Cuando no este hasta el fondo del contenedor, la imagen aparece
      document.getElementById("flechas").style.display="block";
    }
  }
  // Actualizar ajax cada medio segundo
  setInterval(function(){
        actualizar_chat();
    }, 1000);

// Funcion para actualizar chat
function actualizar_chat(){
var id_chat= $(".id").val();
var id_usuario=$(".id_usuario").val();
$.get({
  url: "../obtener_chat",
  data:{
    id_chat:id_chat,
    id_usuario:id_usuario
  },
  success:function (data) {
    console.log(data);
    
    $(".div_chat").html(data);
  }
});
}

// Al darle click a la imagen de la flecha, te manda al fondo del contenedor
$(document).ready(function(){
    $(".flechas").on("click",function(){
      $('.div_chat').scrollTop( $('.div_chat').prop('scrollHeight') );
    });

    $("#boton_enviar").on("click",function(){
        var id_chat = $(".id").val();
        var mensaje = $(".mensaje").val();
        $.get({
            url:'../guardar_mensaje/'+id_chat,
            data:{
                id_chat:id_chat,
                mensaje:mensaje
            },
            success:function(){
            // Modal de mensaje enviado
                Swal.fire({
                    icon: "success",
                    title: "Mensaje Enviado",
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500
                });
                $(".mensaje").val('')
                $('.div_chat').scrollTop( $('.div_chat').prop('scrollHeight') );
            },
            error:function(data){
                console.log(data);
            }
        })
    });
})

