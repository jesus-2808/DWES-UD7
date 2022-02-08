<?php

if (isset($_POST)) {
    $wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL';

    $params = array(
        "Arg1" => (int)$_POST['num1'],
        "Arg2" => (int)$_POST['num2'],
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
    $result = $soap->AddInteger($params);
}


print "<input type='number' name='num1'>";

print "<input type='number' name='num2'>";

print "<input type='submit' name='enviar' value='calcular'>";
