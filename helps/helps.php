<?php

/**
 * Función que sirve para validar y limpiar  un campo --SEGURIDAD--
 *
 * @param     input         $campo         Tiene que ser campo de tipo POST
 * @return     string
 */
//recibir el campo post 
function validar_campo($campo)
{
	//limpiamos campo
    $campo = trim($campo);
    //generamos o duplicamos el codigo - ELIMINAR BARARS INCLINADAS 
    $campo = stripcslashes($campo);
    //validar campo limpiar etiquetas scrip o html limpiar y queda el campo convertivo para que no tenga efectos a la hora del envio
    $campo = htmlspecialchars($campo);
//retornar campo cuando este limpio y no cause problemas con la DB 
    return $campo;
}
