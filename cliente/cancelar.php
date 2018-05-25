<div class="modal fade  modal-slide-in-right" aria-hidden="true" role="dialog" id="modal-delete">
	<!-- Modaldatos -->
	 <form action="" method="post" class="w3_form_post" target="main2" name="formulario2" id="formulario2" onsubmit="">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="#myModal2">&times;</button>
					<h4 class="modal-title">Cancelar Reserva</h4>
					<div class="modal-body">
					<p>Confirme si desea cancelar la reserva</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-success" id="button1">Confirmar</button>
				</div>									
				</div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	$('#button1').on('click', function(event) {
		event.preventDefault();
			idReserva = <?php  $return->return->idReserva;?>;	
			datos="idReserva="+idReserva;					
			$.ajax({
				type: "post",
				url:"eliminar.php",
				data: datos,
				success: function(resp){
					alert('Rserva cancelada');
				}
			});
		
	});


</script>
