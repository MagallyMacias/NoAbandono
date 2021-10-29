<html>
<head>
	<title>Control de Asistencias</title>		
	<style type="text/css">
		@page {
			margin: 0cm 0cm;
			font-family: Arial;
		}	
		body {
			font-family: Arial;
		}			
		.cabeza  {
			position: fixed;
			top: 0cm;
			left: 0cm;
			right: 0cm;
			height: 2.3cm;
			background-color: #7F1E57;
			color: white;
			text-align: center;
			line-height: 30px;
		}

		.pie {
			position: fixed;
			bottom: 0cm;
			left: 0cm;
			right: 0cm;
			height: 2.5cm;
			background-color: #7F1E57;
			color: white;
			text-align: center;
			line-height: 35px;
		}

		.izquierda {
			float: left;
			width: 58px;						
			margin: 4px; 			
		}
		.derecha {
			float: right;
			width: 70px;
			margin: 4px; 
		}
		.escuela {
			font-family: Arial;
			text-align: center;
			margin-left: 60px;
			margin-top: 25px; 
		}		
		.container {
			width: 100%;
			padding-right: 15px;
			padding-left: 15px;
			margin-right: auto;
			margin-left: auto;
		}
		.section {
			padding: 70px 0;
		}		
		.text-center {
			text-align: center !important;
		}					

		.title {
			margin-top: 30px;
			margin-bottom: 25px;
			min-height: 32px;
		}
		.text-primary {
			color: #9c27b0 !important;
		}
		.row {
			display: flex;
			flex-wrap: wrap;
			margin-right: -15px;
			margin-left: -15px;
		}				
		.text-primary {
			color: #9c27b0 !important;
		}	
		hr{
			page-break-after: always;
			border: none;
			margin: 0;
			padding: 0;
		}
		table.tabla1 {
			font-family: Arial, Helvetica, sans-serif;
			border: 1px solid #FFFFFF;
			width: 100%;
			height: 55px;
			text-align: center;
			border-collapse: collapse;
			margin: auto;
		}
		table.tabla1 td, table.tabla1 th {
			border: 1px solid #FFFFFF;
			padding: 3px 2px;
		}
		table.tabla1 tbody td {
			font-size: 13px;
		}
		table.tabla1 tr:nth-child(even) {
			background: #D0E4F5;
		}
		table.tabla1 thead {
			background: #0B6FA4;
			border-bottom: 5px solid #FFFFFF;
		}
		table.tabla1 thead th {
			font-size: 12px;
			font-weight: bold;
			color: #FFFFFF;
			text-align: center;
			border-left: 2px solid #FFFFFF;
		}
		table.tabla1 thead th:first-child {
			border-left: none;
		}

		table.tabla1 tfoot td {
			font-size: 18px;
		}
	</style>
	<?php $puebla = '/img/logo_puebla.png'; ?>	
	<?php $escuela = '/img/logo_bachiller.png'; ?>	
</head>
<body>
	<header class="cabeza">
		<div style="float: left; width: 95%;">
			<img class="izquierda" src="{{ public_path() . $puebla }}"/>
			<h2 class="escuela">Bachillerato General Profesional Ignacia Islas en San Martín Texmelucan
				, San Cristobal Tepatlaxco
			</h2>				
		</div>						
		<div style="float: right; width: 5%;">
			<img class="derecha" src="{{ public_path() . $escuela }}"/ style="height:=80px;">
		</div>
	</header>		
	<div class="container">
		<div class="section">			
			<div class="text-center">   														
				<h2 style="margin: auto 2px;">
					Control de asistencias de tutorados del grupo <br> <b class="text-primary">{{ $grupo->nombre_completo }}</b>
				</h2>		
			</div><br>
			<table class="tabla1">
				<thead>
					<tr>						
						<th style="width: 80px;">Fecha</th>
						<th>Alumno</th>
						<th>Grado y Grupo</th>
						<th>Atención <br> Oportuna</th>
						<th>Atención <br> Seguimiento</th>
						<th>Caso o Situación Atendida</th>
						<th>Solución</th>
						<th>Indicaciones <br> Posteriores</th>
					</tr>
				</thead>
				<tbody>
					@foreach($control as $numero => $control)
					@foreach($control->alumnos as $alumno)
						<tr>							
							<td>{{ $control->fecha }}</td>
							<td>{{ $alumno->nombre_completo }}							
							</td>
							<td>{{ $alumno->grupo->grado}} {{ $alumno->grupo->grupo}}</td>
							<td>{{ $control->atencion_oportuna }}</td>
							<td>{{ $control->atencion_seguimiento }}</td>
							<td>{{ $control->caso_situacion_atendida }}</td>
							<td>{{ $control->solucion }}</td>
							<td>{{ $control->indicaciones_posteriores }}</td>						
						</tr>
					@endforeach
					@endforeach
				</tbody>
			</table>							
			
		</div>
	</div>
	<div class="pie">
		<h3>Francisco Villa No. 1 Colonia el Barrio en San Cristobal Tepatlaxco, C.P. 74120<br>
		 	Teléfono: 1124085
		</h3>
	</div>
</body>
</html>