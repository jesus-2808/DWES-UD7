<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Instanciamos un nuevo servidor SOAP
$uri="http://192.168.129.193/DWES-UD7/Cliente-servidor";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("getCiudad");
$server->handle();

// Función para obtener si el numero es par

function getConnection() {
    $user = 'developer';
    $pwd = 'developer';
    return new PDO('mysql:host=localhost;dbname=ciudades', $user, $pwd);
}
function getCiudad($poblacion) {
  
    
        $db = getConnection();
        $sqlQuery = "SELECT ciudad FROM ciudades WHERE poblacion >=?";

        $stmt = $db->prepare($sqlQuery);
        $stmt->bindParam(1, $poblacion);

        $stmt->execute();

        $ciudades = $stmt->fetchAll();

        return $ciudades;
/*
        $ciudades = [];
        while ($ciudad = $ciudades->fetch()) {
            $ciudades[] = $ciudad;
        }
        return $ciudades;
    }
        
       */

    }
           
          
  



?>