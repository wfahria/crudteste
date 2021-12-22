<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Teste CRUD</title>
<link rel="stylesheet" href="assets/css/layout.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="assets/js/functions.js"></script>
<body>
	
	
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-12 top">
				<h3>Gestor de clientes</h3>
			</div>
		</div>
		
		<div class="row">
			
			<div id="menu" class="col-2">
				<? require("_menu.php"); ?>
			</div>
		
			<div class="col-10">
				
				<div class="row">
					<div class="col-10"></div>
					<div class="col-2">
						<button name="btnNew" id="btnNew" class="btn btn-info">Novo</button>
					</div>
				</div>
				
				
				<form name="frmCustomers" method="post" action="customers.php">
					<div class="row">
						<div class="col-12">
							
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Cliente</th>
										<th>Núm. Contêiner</th>
										<th>Tipo</th>
										<th>Status</th>
										<th>Categoria</th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td><input type="checkbox" name="customerId[]" id="customerId" value=""></td>
										<td>Cliente</td>
										<td>Núm. Contêiner</td>
										<td>Tipo</td>
										<td>Status</td>
										<td>Categoria</td>
									</tr>
								</tbody>
							</table>
							
							
							
						</div>
					</div>				
				</form>
				
			</div>
			
		
		</div>
		
	</div>
	
	
	
	
</body>
</html>