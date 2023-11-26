<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>Id</th>
							<th>Fecha</th>
							<th>Total</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						require "../conexion.php";
						$query = mysqli_query($conexion, "SELECT nofactura, fecha,codcliente, totalfactura, estado FROM factura ORDER BY nofactura DESC");
						mysqli_close($conexion);
						$cli = mysqli_num_rows($query);

						if ($cli > 0) {
							while ($dato = mysqli_fetch_array($query)) {
						?>
								<tr>
									<td><?php echo $dato['nofactura']; ?></td>
									<td><?php echo $dato['fecha']; ?></td>
									<td><?php echo $dato['totalfactura']; ?></td>
									<td>
										<button type="button" class="btn btn-primary view_factura" cl="<?php echo $dato['codcliente'];  ?>" f="<?php echo $dato['nofactura']; ?>">Ver</button>
									</td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- javascript code -->
<script>
  // Obtener una referencia a la tabla por ID
  var table = document.getElementById("table");
  // Cambiar el color de fondo de las filas alternas
var rows = table.getElementsByTagName("tr");
for (var i = 0; i < rows.length; i++) {
  if (i % 2 === 1) {
    rows[i].style.backgroundColor = "#2d3035";
  }
}
// Cambio de estilo a las filas
for (var i = 0; i < rows.length; i++) {
  rows[i].addEventListener("click", function() {
    this.style.backgroundColor = "yellow";
  });
  // Doble clic para restaurar el color original
  rows[i].addEventListener("dblclick", function() {
    this.style.backgroundColor = "#2d3035";
  });
}
</script>

<!-- /.container-fluid -->

<?php include_once "includes/footer.php"; ?>