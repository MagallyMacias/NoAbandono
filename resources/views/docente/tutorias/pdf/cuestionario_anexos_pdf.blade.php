<html>
<head>
	<title>Cuestionario Anexos del Alumno {{$alumno->nia}}</title>		
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
		.col-md-4 {
			flex: 0 0 33.333333%;
			max-width: 33.333333%;
		}
		.form-group {
			margin-bottom: 1rem;
		}
		.col-md-3 {
			flex: 0 0 25%;
			max-width: 25%;
		}	
		hr{
			page-break-after: always;
			border: none;
			margin: 0;
			padding: 0;
		}
		table.marcax {
			font-family: Arial, Helvetica, sans-serif;
			border: 1px solid #FFFFFF;
			width: 750px;
			height: 200px;
			text-align: left;
			border-collapse: collapse;
			margin: auto;
		}
		table.marcax td, table.marcax th {
			border: 1px solid #FFFFFF;
			padding: 3px 2px;
		}
		table.marcax tbody td {
			font-size: 13px;			
		}
		table.marcax tr:nth-child(even) {
			background: #D0E4F5;
		}
		table.marcax tfoot td {
			font-size: 14px;
		}
		.habtidotd {
			text-align: center;
		}
		table.marca_si_no {
			font-family: Arial, Helvetica, sans-serif;
			border: 1px solid #1C6EA4;
			width: 750px;
			height: 200px;
			text-align: center;
			border-collapse: collapse;
			margin: auto;
		}
		table.marca_si_no td, table.marca_si_no th {
			border: 1px solid #AAAAAA;
			padding: 3px 2px;
		}
		table.marca_si_no tbody td {
			font-size: 13px;
		}
		table.marca_si_no tr:nth-child(even) {
			background: #D0E4F5;
		}
		table.marca_si_no tfoot td {
			font-size: 14px;
		}
	</style>
	<?php $puebla = '/img/logo_puebla.png'; ?>	
	<?php $escuela = '/img/logo_bachiller.png'; ?>	
</head>
<body>
	<header class="cabeza">
		<div style="float: left; width: 95%;">
			<img class="izquierda" src="{{ public_path() . $puebla }}"/>
			<h2 class="escuela">Bachillerato General Profesional Ignacia Islas en San Mart??n Texmelucan
				, San Cristobal Tepatlaxco
			</h2>						
		</div>						
		<div style="float: right; width: 5%;">
			<img class="derecha" src="{{ public_path() . $escuela }}"/ style="height: 80px;">
		</div>
	</header>		
	<div class="container">
		<div class="section">			
			<div class="text-center">   														
				<h2 style="margin: auto 2px;">
					Alumno: <b class="text-primary">{{$alumno->nombre_completo}}</b>
				</h2>		
			</div>							
			<h3 class="title text-primary">Atribuciones</h3>
			<!---->
			<b>1. Tu maestra(o) califica tus tareas con m??s comentarios que los de tus amigos.</b>
			<p>R= {{ $cuestionario->atribucion->respuesta1}}</p>			
			<!---->
			<b>2. Un estudiante te observa durante todo el recreo.</b>
			<p>R= {{ $cuestionario->atribucion->respuesta2}}</p>
			<!---->
			<b>3. A un amigo tuyo lo escogen para ser parte de un equipo que participar?? en un concurso acad??mico y ya no tiene tanto tiempo para estar contigo.</b>
			<p>R= {{ $cuestionario->atribucion->respuesta3}}</p>
			<!---->
			<b>4. Un amigo te grita cuando intentas consolarlo por el divorcio de sus padres.</b>
			<p>R= {{ $cuestionario->atribucion->respuesta4}}</p>
			<!---->
			<b>5. Tu amigo(a) quiere llamar la atenci??n de un(a) compa??era (compa??ero).</b>
			<p>R= {{ $cuestionario->atribucion->respuesta5}}</p>
			<!---->
			<b>6. Alguien escribi?? algo negativo de ti en el pizarr??n.</b>
			<p>R= {{ $cuestionario->atribucion->respuesta6}}</p>
			<!---->
			<b>7. Te llaman a la oficina del director despu??s de que fuiste testigo de una pelea en el pasillo.</b>
			<p>R= {{ $cuestionario->atribucion->respuesta7}}</p>									
		</div>
	</div>
	<div class="pie">
		<h3>Francisco Villa No. 1 Colonia el Barrio en San Cristobal Tepatlaxco, C.P. 74120<br>
		 	Tel??fono: 1124085
		</h3>
	</div><hr>
	<div class="container">
		<div class="section">									
			<h3 class="title text-primary" style="margin-top: 60px;">Niveles de Empat??a</h3>
			<h4 class="text-justify">
				La empat??a incluye reconocer c??mo se est?? sintiendo otra persona, teniendo la perspectiva de esa persona, en una escala de 1 a 5 (siendo 1 ???baja empat??a??? y 5 ???alta empat??a???), califique el nivel de empat??a que siente para cada persona en las siguientes situaciones.
			</h4><br>
			<!---->
			<b>1. Un estudiante que no conoces es suspendido de la escuela por algo que no hizo.</b>
			<p>R= {{ $cuestionario->nivel_empatia->respuesta1}}</p>
			<!---->
			<b>2. Un amigo cercano es castigado por sus padres una semana.</b>
			<p>R= {{ $cuestionario->nivel_empatia->respuesta2}}</p>	
			<!---->
			<b>3. Un estudiante de una de tus clases dice sentirse triste porque tiene problemas en casa.</b>
			<p>R= {{ $cuestionario->nivel_empatia->respuesta3}}</p>
			<!---->
			<b>4. Escuchas que un estudiante que apenas conoces se mudar?? a otro estado.</b>
			<p>R= {{ $cuestionario->nivel_empatia->respuesta4}}</p>	
			<!---->
			<b>5. Tu maestra est?? triste y desilusionada porque el grupo sali?? muy mal en un examen importante.</b>
			<p>R= {{ $cuestionario->nivel_empatia->respuesta5}}</p>	
			<!---->
			<b>6. Un estudiante que conoces ya no puede pagar el transporte para llegar a la escuela.</b>
			<p>R= {{ $cuestionario->nivel_empatia->respuesta6}}</p>	
			<!---->
			<b>7. Un estudiante con el que no tienes mucho en com??n est?? siendo v??ctima de acoso escolar.</b>
			<p>R= {{ $cuestionario->nivel_empatia->respuesta7}}</p>	
			<!---->
			<b>8. Tu mam?? o tu pap?? tuvieron un mal d??a en el trabajo.</b>
			<p>R= {{ $cuestionario->nivel_empatia->respuesta8}}</p>	
			<!---->
			<b>9. El perro de un amigo muri??.</b>
			<p>R= {{ $cuestionario->nivel_empatia->respuesta9}}</p>				
		</div>
	</div><hr>		
	<div class="container">
		<div class="section">									
			<h3 class="title text-primary" style="margin-top: 60px;">Tipo de mentalidad</h3>
			<h4 class="text-justify">
				Lee cada enunciado y marca con una cruz si est??s ???de acuerdo??? o ???en desacuerdo???. No hay respuestas correctas o incorrectas.
			</h4><br>
			<!---->
			<b>1. Tu inteligencia es algo muy b??sico de ti y no la puedes cambiar mucho.</b>
			<p>R= {{ $cuestionario->tipo_mentalidad->respuesta1}}</p>
			<!---->
			<b>2. Puedes aprender nuevas cosas, pero realmente no puedes cambiar qu?? tan inteligente eres.</b>
			<p>R= {{ $cuestionario->tipo_mentalidad->respuesta2}}</p>
			<!---->
			<b>3. No importa qu?? tan inteligente seas, siempre podr??s cambiar tu inteligencia aunque sea un poco.</b>
			<p>R= {{ $cuestionario->tipo_mentalidad->respuesta3}}</p>
			<!---->
			<b>4. Siempre puedes cambiar sustancialmente qu?? tan inteligente eres. </b>
						<p>R= {{ $cuestionario->tipo_mentalidad->respuesta4}}</p>	
			<!---->
			<b>5. Completa el siguiente enunciado de tal modo que los n??meros en los dos espacios sumen 100% </b>
			<p>
				R= INTELIGENCIA = {{$cuestionario->tipo_mentalidad->respuesta5}} % HABILIDADES +{{$cuestionario->tipo_mentalidad->r5}} % ESFUERZO.
			</p>	
			<h3 class="text-center">Gracias por compartir esta informaci??n usted es lo m??s importante para nosotros.</h3>
		</div>
	</div>	
</body>
</html>