<?php

if (isset($_POST['submit'])){
    echo "on submit proccess";
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $tipoId = $_POST['tipoId'];
    $numeroDoc = $_POST['numeroDoc'];
    $consulta = $_POST['consulta'];
   
    
    //Aqui empieza la validación del campo nombre 

    
    if(empty($nombre)){
        echo "<p class='error'> Agregar tu nombre </p>";
    } else {
        //la función strlen cuenta el número de caracters
        if(strlen($nombre)>60){
            echo "<p class='error'> la maximo es de 60 caracteres en el campo nombre</p>";
        }elseif(strlen($nombre)<5){
            echo "<p class='error'> la minimo es de 5 caracteres en el campo nombre</p>";
        }
    }

    //Aqui empieza la validación del campo telefono| 
    if(empty($telefono)){
        echo "<p class='error'> Agregar tu telefono </p>";
    } else {
        //la función strlen cuenta el número de caracters
        if(strlen($telefono)>16){
            echo "<p class='error'> la maximo es de 16 caracteres en el campo telefono</p>";
        }elseif(strlen($telefono)<6){
            echo "<p class='error'> la minimo es de 6 caracteres en el campo telefono</p>";
        //filter_var es un comando de validación de correos y FILTER_SANITIZE_NUMBER_INT permite validar si es un número, +, espacio o -, recuerda que ! significa NO
        }elseif(!filter_var($telefono, FILTER_SANITIZE_NUMBER_INT)){
            echo "<p class='error'> El telefono es incorrecto </p>";
        }
    }

    //Aqui empieza la validación del campo correo 
    if(empty($correo)){
        echo "<p class='error'> Agregar tu correo </p>";
    }else {
        //filter_var es un comando de validación de correos y FILTER_VALIDATE_EMAIL permite validar si es un correo, recuerda que ! significa NO
        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            echo "<p class='error'> El Correo es incorrecto </p>";
        }
    }

    //Aqui empieza la validación del campo numeroDoc 
    //la función empty es para verificar si esta vacia 
    if(empty($numeroDoc)){
        echo "<p class='error'> Agregar tu numeroDoc </p>";
    } else {
        //la función strlen cuenta el número de caracters
        if((strlen($numeroDoc)>12)&&($tipoId=="CI")){
            echo "<p class='error'> lo maximo es de 12 caracteres en el campo numeroDoc</p>";
        }elseif((strlen($numeroDoc)<6)&&($tipoId=="CI")){
            echo "<p class='error'> la minimo es de 6 caracteres en el campo numeroDoc</p>";
        }elseif((strlen($numeroDoc)>18)&&($tipoId=="CE")){
            echo "<p class='error'> lo maximo es de 18 caracteres en el campo numeroDoc</p>";
        }elseif((strlen($numeroDoc)<8)&&($tipoId=="CE")){
            echo "<p class='error'> la minimo es de 8 caracteres en el campo numeroDoc</p>";
        }
    }

    //Aqui empieza la validación del campo consulta 
    if(empty($consulta)){
        echo "<p class='error'> Agregar tu consulta </p>";
    } else {
        //la función strlen cuenta el número de caracters
        if(strlen($consulta)>300){
            echo "<p class='error'> lo maximo es de 300 caracteres en el campo consulta</p>";
        }elseif(strlen($consulta)<8){
            echo "<p class='error'> la minimo es de 8 caracteres en el campo consulta</p>";
        }
    }
    
   //Conectar con el servidor
$link=mysqli_connect('localhost','root','');
if(!$link){
echo'No se pudo establecer conexion con el servidor:';
}else{
       //Seleccionamos Base de datos
$base=mysqli_select_db($link, 'form');
if(!$base){
            echo'No se encontro la base de datos:';
    }else{
         //Sentencia SQL
        $sql= "INSERT INTO tablam (Nombre,telefono, correo, documento, numero_documento, consulta) VALUES ('$nombre','$telefono','$correo', '$tipoId', '$numeroDoc', '$consulta')";
        $ejecuta_sentencia = mysqli_query($link, $sql);
        if(!$ejecuta_sentencia){
            echo'Hay un error en la sentencia SQL:';
    }else{ echo'Error al mostrar lista de usuarios:';
}
}
    }

}

?>  