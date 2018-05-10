<?php
    try {
        $wsdl_url = 'http://localhost:8080/HotelServidor/Hotel?WSDL';
        $client = new SOAPClient($wsdl_url);
        $params = array(
            'usuario' => $_POST['usuario'],
            'password' => $_POST['password'],
        );
        $return = $client->ingresar_usuario($params); 
        if (count($return->return)!=null){
            echo '<div class="booking-form-head-agile">';
            echo "<h4>Lista de Reserva</h4>";
            echo "</div>   ";
            echo "<table class='table table-striped table-bordered table-condensed table-hover'>";
            
		        echo "<thead>";
		        	echo "<th>Cedula</th>";
		            echo "<th>Nombre</th>";
		            echo "<th>Entrada</th>";
		            echo "<th>Salida</th>";
		            echo "<th>Reserva</th>";
		            echo "<th>Id Hab.</th>";
		            echo "<th>Tipo Hab.</th>";
		            echo "<th>Opcion</th>";
		        echo "</thead>";
		        foreach ($return as $res){
		        	if (count($return->return)!=1){        	
			            $con=count($return->return);
			            for($i=0;$i<$con;$i++){
			                echo "<tr>";
			               		echo "<td>";
			                    echo $return->return[$i]->idCliente;
			                    echo "</td>";
			                    echo "<td>";
			                    echo $return->return[$i]->nombreCliente;
			                    echo "</td>";
			                    echo "<td>";
			                    echo $return->return[$i]->diaEntrada;
			                    echo "</td>";     
			                    echo "<td>";
			                    echo $return->return[$i]->diaSalida;
			                    echo "</td>";
			                    echo "<td>";
			                    echo $return->return[$i]->diaReserva;
			                    echo "</td>";          
			                    echo "<td>";
			                    echo $return->return[$i]->idHabitacion;
			                    echo "</td>";
			                    echo "<td>";
			                    echo $return->return[$i]->tipoHabitacion;
			                    echo "</td>"; 
			                    echo "<td>";
				                    echo '<input id="idReserva" name="idReserva" value="'.$return->return[$i]->idReserva.'" style="display:none">';
				                    echo '<input id="idReserva_habitacion" name="idReserva_habitacion" value="'.$return->return[$i]->idReserva_habitacion.'" style="display:none">';
									echo "<a href='' data-toggle='modal' data-target='#reservaEl'><button class='btn btn-danger'>Eliminar</button></a>";
								echo "</td>";
			                echo "</tr>";
			                }
		            }else{
		            	$con=count($return->return);
			            for($i=0;$i<$con;$i++){
			                echo "<tr>";
			               		echo "<td>";
			                    echo $return->return->idCliente;
			                    echo "</td>";
			                    echo "<td>";
			                    echo $return->return->nombreCliente;
			                    echo "</td>";
			                    echo "<td>";
			                    echo $return->return->diaEntrada;
			                    echo "</td>";     
			                    echo "<td>";
			                    echo $return->return->diaSalida;
			                    echo "</td>";
			                    echo "<td>";
			                    echo $return->return->diaReserva;
			                    echo "</td>";          
			                    echo "<td>";
			                    echo $return->return->idHabitacion;
			                    echo "</td>";
			                    echo "<td>";
			                    echo $return->return->tipoHabitacion;
			                    echo "</td>"; 
			                    echo "<td>";
				                    echo '<input id="idReserva" name="idReserva" value="'.$return->return->idReserva.'" style="display:none">';
				                    echo '<input id="idReserva_habitacion" name="idReserva_habitacion" value="'.$return->return->idReserva_habitacion.'" style="display:none">';
									echo "<a href='' data-toggle='modal' data-target='#reservaEl'><button class='btn btn-danger'>Eliminar</button></a>";
								echo "</td>";
			                echo "</tr>";
			            }
			        }           
		        }     
		                  
		    echo "</table>";
            
        }else{
            if ($return->return==null){
                echo "<br>";
                echo '<div class="booking-form-head-agile">';
                echo "<h4>No existen reservas!</h4>";
                echo "</div>   ";
               
            }
        }    
    
    } catch (Exception $e) {
        echo "Exception occured: " . $e;
    }
?>
