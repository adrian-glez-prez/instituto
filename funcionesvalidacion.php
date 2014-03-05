<?php
//constantes

//funciones
function limpiar($valor) {
    return strip_tags(trim(htmlspecialchars($valor, ENT_QUOTES, "ISO-8859-1"))); 
}

function validarLongNombre($string) {
    $resultado=false;
    $string=  limpiar($string);
    if (strlen($string)<31 && strlen($string)>0) {
        $resultado=true;
    }
    return $resultado;
}

function validarNumCurso($string) {
    $resultado=false;
    $string=limpiar($string);
    if (filter_var($string,FILTER_VALIDATE_INT)) {
        $resultado=TRUE;
    }
    return $resultado;
}

function validarLongAsignatura($string) {
    $resultado=false;
    if (strlen($string)<20 && strlen($string)>2) {
        $resultado=TRUE;
    }
    return $resultado;
}


?>

