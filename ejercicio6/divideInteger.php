<?php

if (isset($_POST['enviar'])) {
    $wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL';

    $params = array(
        "Arg1" => $_POST['num1'],
        "Arg2" => $_POST['num2']
    );

    $options = array(
        "uri" => $wsdl,
        "style" => SOAP_RPC,
        "use" => SOAP_ENCODED,
        "soap_version" => SOAP_1_1,
        "cache_wsdl" => WSDL_CACHE_BOTH,
        "connection_timeout" => 15,
        "trace" => false,
        "encoding" => "UTF-8",
        "exceptions" => false,
    );

    $soap = new SoapClient($wsdl, $options);
    $result = $soap->DivideInteger($params);

    // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php

}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Calculo de suma</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>

    <form action="divideInteger.php" method="post">
        <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN



        print "<input type='number' name='num1'>";

        print "<input type='number' name='num2'>";

        print "<input type='submit' name='enviar' value='Dividir'>";
        if (isset($_POST['enviar'])) {
            print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $result->DivideIntegerResult . "</p>";
        }

        ?>

    </form>

</body>

</html>