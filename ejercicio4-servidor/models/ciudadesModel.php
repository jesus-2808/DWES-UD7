
<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN


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

        $ciudad = $stmt->fetchAll();

        return $ciudad;
    
  
}