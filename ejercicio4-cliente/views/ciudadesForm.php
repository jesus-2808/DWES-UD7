<!DOCTYPE html>
<html>
    <head>
        <title>Calculo de suma</title>
        <link rel="stylesheet" type="text/css" href="/estilo.css">
    </head>
<body>
   
<form action="?controller=ciudades&action=formulario" method="post">
    <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
     
      print "<input type='number' name='poblacion'>";
  
      print "<input type='submit' name='enviar' value='Calcular numero'>";
      print "<p class='error'>$error</p>";
      
    
  ?>
    
    </form>
  
</body>
</html>