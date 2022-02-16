<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Instanciamos un nuevo servidor SOAP
$uri="http://192.168.1.4/DWES-UD7/Cliente-servidor/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("getCiudad");
$server->handle();

// Función para obtener si el numero es par

function getConnection() {
    $user = 'root';
    $pwd = 'root';
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