<?php

if (isset($_POST['enviar'])) {
    $wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL';

    $params = array(
        "id" => $_POST['id'],

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
    $result = $soap->FindPerson($params);

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

    <form action="findPerson.php" method="post">
        <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN



        print "<input type='number' name='id'>";

        print "<input type='submit' name='enviar' value='Dividir'>";
        if (isset($_POST['enviar'])) {
            foreach ($result as $person) {
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person->Name . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person->SSN . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person->DOB . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person->Home->Street . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person->Home->City . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person->Home->State . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person->Home->Zip . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person->Office->Street . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person->Office->City . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person->Office->State . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person->Home->Zip . "</p>";
            }
        }

        ?>

    </form>

</body>

</html>