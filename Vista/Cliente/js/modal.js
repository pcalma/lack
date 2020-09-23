function guardarModal(nombre_u,email,tel_cliente){

cadena ="nombre_u=" + nombre_u + "email=" + email + "tel_cliente=" + tel_cliente;

//ABRIMOS AJAx - 4 ATRIBUTOS 
    $.ajax({
    	typer_"POST",
    	url: "agregarDatos.php",
    	data:,
    	success:function(r){

    		if (r==1) {

    			alertify.success("agregado con exito");

    		}else{
    			alertify.error("fallo el servidor")
    		}
    	}


    });

}