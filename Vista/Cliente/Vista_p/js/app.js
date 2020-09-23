$(document).ready(function() {

    $("#loginForm").bind("submit", function() {

        $.ajax({
            //datos que traemos desde el form 
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            //campos que se recuperan tipo post --- serializar la informacion y enviarla a todos los campos que tenga el formulario 
            data: $(this).serialize(),
            //cambie el texto del boton del form a otro  
            beforeSend:function(){
                //prueba
            //    $("#loginForm button[type=submit]").text("otro");
                 $("#loginForm button[type=submit]").html("enviando.....");
                 //agrege un desactivar boton 
                 $("#loginForm button[type=submit]").removeAttr("disabled");

            },
 //           beforeSend: function() {
   //             $("#loginForm button[type=submit]").html("enviando...");
     //           $("#loginForm button[type=submit]").attr("disabled", "disabled");
       //     },
       //leer el response ->consol.log(response)

            success: function(response) {
                if (response.estado == "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Usuario encontrado, te estamos redirigiendo...",
                          //cuando termine se ejucuta la funsion anonima 
                        callback:function(){
                            window.location.href = "Vista/Cliente/inicio.php";  //registro.php
                        }
                    });
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "Usuario o password incorrecto!"
                    });
                }

                $("#loginForm button[type=submit]").html("Ingresar.....");
                $("#loginForm button[type=submit]").removeAttr("disabled");

            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "Usuario o password incorrecto!"
                });
                $("#loginForm button[type=submit]").html("Ingresar.....");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            }
        });

        return false;
    });

});

