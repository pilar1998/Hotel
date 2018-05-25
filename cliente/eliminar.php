<?php
try {
    $wsdl_url = 'http://localhost:8080/HotelServidor/Hotel?WSDL';
    $client = new SOAPClient($wsdl_url);
    $params = array(
        'idReserva' =>  $_POST['idReserva'],
    );
    $return = $client->cancelarReserva($params);
    print_r($return);
} catch (Exception $e) {
    echo "Exception occured: " . $e;
}

   
?>