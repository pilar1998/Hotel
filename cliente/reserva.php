<?php
try {
    $wsdl_url = 'http://localhost:8080/HotelServidor/Hotel?WSDL';
    $client = new SOAPClient($wsdl_url);
    $params = array(
        'estado_reserva' => 'disponible',
        'diaEntrada' => $_POST['diaEntrada'],
        'diaSalida' => $_POST['diaSalida'],
        'idCliente' => $_POST['Cedula'],
        'diaReserva' => (string)date('Y-m-d'),
        'idHabitacion' => $_POST['idHabitacion'],

    );
    $return = $client->AgregarReserva($params);
    if ($return->return=="no disponible"){
            echo "<br>";
            echo '<div class="booking-form-head-agile">';
            echo "<h3>El id de cliente no existe!</h3>";
            echo "</div>   ";
            
        }else{
            if ($return->return=="disponible"){
                echo "<br>";
                echo '<div class="booking-form-head-agile">';
                echo "<h3>Reserva realizada con exito!</h3>";
                echo "<h3>Recuerde: su usuario y contraseña son la cedula</h3>";
                echo "</div>   ";
               
            }
        }    
} catch (Exception $e) {
    echo "Exception occured: " . $e;
}
?>