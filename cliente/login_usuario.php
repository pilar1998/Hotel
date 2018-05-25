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
        echo '<form action="" method="post" class="w3_form_post"  id="formulario" name="formulario" >';
        echo "<table class='table table-striped table-bordered table-condensed table-hover'>";
        
	        echo "<thead>";
	        	echo "<th>Cedula</th>";
	            echo "<th>Nombre</th>";
	            echo "<th>Entrada</th>";
	            echo "<th>Salida</th>";
	            echo "<th>Reserva</th>";
	            echo "<th>Id Hab.</th>";
	            echo "<th>Tipo Hab.</th>";
	            echo "<th>Estado.</th>";
	        echo "</thead>";
	        foreach ($return as $res){
	        	if (count($return->return)!=1){        	
		            $con=count($return->return);
		            for($i=0;$i<$con;$i++){
		            	if (($return->return[$i]->estado_reserva)!='no disponible'){
		            		$idReserva[$i]=$return->return[$i]->idReserva;
			                echo "<tr>";
			               		echo "<td>";
			               		echo "<input value='".$return->return[$i]->idReserva."' id='idReserva' name='idReserva' disabled style='display: none'>" ;
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
			                    echo $return->return[$i]->estado_reserva;
			                    echo "</td>"; 
			                    
			                    
			                echo "</tr>";
			            }else{
			            	 echo "<h3>No existen reservas!</h3>";
			            }
		                
		            }
	            }else{
	            	$con=count($return->return);
		            for($i=0;$i<$con;$i++){
		            	if (($return->return->estado_reserva)!='no disponible'){
			                echo "<tr>";
			               		echo "<td>";
			               		$idReserva=$return->return->idReserva;
			               		echo "<input value='".$return->return->idReserva."' id='idReserva' name='idReserva' disabled style='display: none'>" ;
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
			                    echo $return->return->estado_reserva;
			                    echo "</td>";
			                    if (($return->return->estado_reserva)=='cancelada'){
			                    	echo "<td>";						                    
										echo '<a href="" data-target="#modal-delete" data-toggle="modal" style="display: none><button class="btn btn-danger" disabled style="display: none">Cancelar</button></a>';
									echo "</td>";
			                    }else{
			                    	echo "<td>";
						                    echo '<a href="" data-target="#modal-delete" data-toggle="modal"><button class="btn btn-danger">Cancelar</button></a>';
										echo "</td>";
			                    }
			                    
			                echo "</tr>";
			            }else{
			            	echo "<h3>No existen reservas!</h3>";
			            }
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

<div class="modal fade" id="reserva" tabindex="-1" role="dialog">
			<!-- ModalReserva -->
				<div class="modal-dialog modal-lg">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button  type="button" class="close" data-dismiss="modal" id="cerrar2">&times;</button>
				            <h4>Bienvenido</h4>
				            <div id="reservaconten">
				            	
				            </div>
				            		
					</div>
				</div>
			</div>
		</div>




<div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-{{$return->return[$i]->idReserva}}">
	<!-- Modaldatos -->
	 
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="#reserva">&times;</button>
					<h4 class="modal-title">Cancelar Reserva</h4>
					<div class="modal-body">
					<p>Confirme si desea cancelar la reserva</p>
				</div>
				<form action="" method="post" class="w3_form_post" target="main2" name="formulario3" id="formulario3" onsubmit="return cancelar($return->return[$i]->idReserva)">

					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#reserva" >Cerrar $return->return[$i]->idReserva</button>
						<button type="submit" class="btn btn-success" id="button11" data-toggle="modal" data-target="#reserva">Confirmar</button>
					</div>
				</form>									
				</div>
			</div>
		</div>
</div>
<script>
	
	alert('jajaj no funciona');
	$('#button11').on('click', function(event) {
		event.preventDefault();
		alert('entro');
		idReserva = <?php $idReserva?>;
		alert(idReserva);	
		datos="idReserva="+idReserva;					
		$.ajax({
			type: "post",
			url:"eliminar.php",
			data: datos,
			success: function(resp){
				alert('Reserva cancelada');
			}
		});


</script>

