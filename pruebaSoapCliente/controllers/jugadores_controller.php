<?php

function formulario(){
 
    
    $error = "";
    $resultado = "";

    
$url = "http://localhost/DWES-UD7/pruebaSoapServidor/index.php?action=formulario";
$uri = "http://localhost/DWES-UD7/pruebaSoapServidor";

    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

  
        
        // Ejecutamos las siguientes líneas al enviar el formulario
        if (count($_POST) > 0) {
            // Establecemos los parámetros de envío
            if (!empty($_POST['edad'])  ) {
                $edad = $_POST['edad'];
                // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
          //      $cliente->setCiudades("Kimia" , 1000);      
           //     $cliente->setCiudades("cc" , 500);
    
                $jugadores =$cliente->getPlayer($edad);
                var_dump($jugadores);
                echo "<h1>Jugadores mayores</h1>";
                if(is_array($jugadores)){
                    for ($i=0; $i < count($jugadores) ; $i++) { 
                        echo " Nombre: " . $jugadores[$i]["Nombre"] . " Edad: ". $jugadores[$i]["Edad"]  ."<br>";
                    }
                }
              
            } else {
                $error = "<strong>Error:</strong> Debes introducir un DNI correcto<br/><br/>Ej: 45678987";
            }
        }else{
            include "./views/jugadores_form.php"; 
        }
        
}
