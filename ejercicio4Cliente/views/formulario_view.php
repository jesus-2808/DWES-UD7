<!DOCTYPE html>
<html>
    <head>
        <title>Ciudades - Servicio Web + PHP + SOAP</title>
    </head>
<body>
    <h1>Ciudades</h1>
    
    <form action="index.php?controller=ciudades&action=formulario" method="POST">
    <?php
        print "<input type='number' name='poblacion' value='$poblacion'>";
        print "<input type='submit' name='enviar' value='Comprobar'>";
        print "<p class='error'>$error</p>";
     
    ?>
    </form>
</body>
</html>