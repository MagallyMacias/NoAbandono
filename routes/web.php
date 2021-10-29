<?php
use Illuminate\Http\Request;
Route::get('/', function () {	
	return view('welcome');
});

Route::post('/logout', 'Auth\LogoutController@logout')->name('all.logout'); //Cerrar sesión para alumno, docente y padreF

Route::prefix('alumno')->group(function(){
	//logins
	Route::get('/login','Auth\Alumno\AlumnoLoginController@showLoginForm')->name('alumno.login');
	Route::post('/login','Auth\Alumno\AlumnoLoginController@login');
	//finLogins
	//olvidaste contraseña
	Route::get('/password/reset','Auth\Alumno\AlumnoForgotPasswordController@showLinkRequestForm')
			   ->name('alumno.password.request');

	Route::post('/password/email','Auth\Alumno\AlumnoForgotPasswordController@sendResetLinkEmail')
			   ->name('alumno.password.email');

	Route::get('/password/reset/{token}','Auth\Alumno\AlumnoResetPasswordController@showResetForm')
				->name('alumno.password.reset');
				
	Route::post('/password/reset','Auth\Alumno\AlumnoResetPasswordController@reset');
	//finContraseña
});

Route::middleware(['auth:alumno'])->prefix('/alumno')->group(function(){
	Route::get('/', 'Alumno\AlumnoController@index');
	Route::get('/{nia}/edit','Alumno\AlumnoController@edit');
	Route::post('/{nia}/edit','Alumno\AlumnoController@update');
	Route::get('/{nia}/parentesco','Parentesco\AlumnoParentescoController@create');
	Route::post('/{nia}/parentesco','Parentesco\AlumnoParentescoController@store');
	Route::post('/{alumno_id}/parentesco/{padre_id}/delete','Parentesco\AlumnoParentescoController@destroy');	
	Route::get('/{nia}/domicilio', 'Domicilio\AlumnoDomicilioController@mostrar_domicilio');//Muestra el listado de domicilio
	Route::post('/{nia}/domicilio', 'Domicilio\AlumnoDomicilioController@seleccionar_domicilio');//Agregar el domicilio
	Route::post('/{nia}/domicilio/{domicilio_id}/delete', 'Domicilio\AlumnoDomicilioController@destroy_domicilio'); //eliminar D
	Route::get('/{nia}/domicilio/registrar','Domicilio\AlumnoDomicilioController@create');//mostramos formulario para D
	Route::post('/domicilio/registrar','Domicilio\AlumnoDomicilioController@store');//agregamos domicilio
	
	//Index de todas las encuestas del alumno
	Route::get('encuestas','Alumno\EncuestasController@index');
	//Entrevistas fresca
	Route::get('/entrevista','Alumno\Entrevista_fresca\EntrevistaAlumnoController@index');
	Route::post('/entrevista','Alumno\Entrevista_fresca\EntrevistaAlumnoController@store');
	Route::get('/entrevista/datos/familiares','Alumno\Entrevista_fresca\DatosFamiliaresController@create');
	Route::post('/entrevista/datos/familiares','Alumno\Entrevista_fresca\DatosFamiliaresController@store');
	Route::get('/entrevista/datos/academicos','Alumno\Entrevista_fresca\DatosAcademicosController@create');
	Route::post('/entrevista/datos/academicos','Alumno\Entrevista_fresca\DatosAcademicosController@store');	
	Route::get('/entrevista/habitos/estudio','Alumno\Entrevista_fresca\HabitosEstudioController@create');
	Route::post('/entrevista/habitos/estudio','Alumno\Entrevista_fresca\HabitosEstudioController@store');
	Route::get('/entrevista/otras/actividades','Alumno\Entrevista_fresca\OtrasActividadesController@create');
	Route::post('/entrevista/otras/actividades','Alumno\Entrevista_fresca\OtrasActividadesController@store');
	Route::get('/entrevista/datos/adicionales','Alumno\Entrevista_fresca\DatosAdicionalesController@create');
	Route::post('/entrevista/datos/adicionales','Alumno\Entrevista_fresca\DatosAdicionalesController@store');
	Route::post('/finalizar/entrevista','Alumno\Entrevista_fresca\EntrevistaAlumnoController@update');
	//FINALIZAR ENTREVISTA FRESCA

	//INICIO CUESTIONARIO ANEXOS
	Route::get('/cuestionario','Alumno\Cuestionario_anexos\CuestionarioAlumnoController@index');
	Route::post('/cuestionario','Alumno\Cuestionario_anexos\CuestionarioAlumnoController@store');
	Route::post('/finalizar/cuestionario','Alumno\Cuestionario_anexos\CuestionarioAlumnoController@update');
	Route::get('/cuestionario/atribuciones','Alumno\Cuestionario_anexos\AtribucionesController@create');
	Route::post('/cuestionario/atribuciones','Alumno\Cuestionario_anexos\AtribucionesController@store');
	Route::get('/cuestionario/nivel_empatia','Alumno\Cuestionario_anexos\NivelesEmpatiaController@create');
	Route::post('/cuestionario/nivel_empatia','Alumno\Cuestionario_anexos\NivelesEmpatiaController@store');
	Route::get('/cuestionario/tipo_mentalidad','Alumno\Cuestionario_anexos\TiposMentalidadController@create');
	Route::post('/cuestionario/tipo_mentalidad','Alumno\Cuestionario_anexos\TiposMentalidadController@store');
	//FINALIZA CUESTIONARIO ANEXOS

	//INICIO TEST
	Route::post('/test/create','Alumno\Test\TestController@store'); //Cuando valla a la vista creamos la inserción
	Route::get('/test','Alumno\Test\TestController@index'); //Muestra las secciones del test
	Route::get('/test/conociendo_estilos_aprendizaje','Alumno\Test\ConociendoEstiloAprendizajeController@create');
	Route::post('/test/conociendo_estilos_aprendizaje','Alumno\Test\ConociendoEstiloAprendizajeController@store');
	Route::get('/test/encontrar_estilo_aprendizaje','Alumno\Test\EncontrarEstiloAprendizajeController@create');
	Route::post('/test/encontrar_estilo_aprendizaje','Alumno\Test\EncontrarEstiloAprendizajeController@store');	
	//HABITOS DE ESTUDIO
	Route::post('/test/habitos_estudio', 'Alumno\Test\Habito_Estudio\HabitoEstudioController@store');
	Route::get('/test/habitos_estudio', 'Alumno\Test\Habito_Estudio\HabitoEstudioController@index');
	Route::get('/test/habitos_estudio/organizacion_tiempo', 'Alumno\Test\Habito_Estudio\OrganizarTiempoController@create');
	Route::post('/test/habitos_estudio/organizacion_tiempo', 'Alumno\Test\Habito_Estudio\OrganizarTiempoController@store');
	Route::get('/test/habitos_estudio/planificacion', 'Alumno\Test\Habito_Estudio\PlanificacionController@create');
	Route::post('/test/habitos_estudio/planificacion', 'Alumno\Test\Habito_Estudio\PlanificacionController@store');
	Route::get('/test/habitos_estudio/estrategia_aprendizaje', 'Alumno\Test\Habito_Estudio\EstrategiaAprendizajeController@create');
	Route::post('/test/habitos_estudio/estrategia_aprendizaje', 'Alumno\Test\Habito_Estudio\EstrategiaAprendizajeController@store');
	Route::post('/test/finalizar/habitos_estudio','Alumno\Test\Habito_Estudio\HabitoEstudioController@update');
	//FIN DE HABITOS DE ESTUDIO
	Route::post('/finalizar/test','Alumno\Test\TestController@update');
	//FIN TEST
	//INICIAR TEST ATENCION INDIVIDUAL 	
	Route::post('/test/atencion_individual/iniciar','Alumno\Test\AtencionIndividualController@iniciar');
	Route::get('/test/atencion_individual','Alumno\Test\AtencionIndividualController@create');
	Route::post('/test/atencion_individual','Alumno\Test\AtencionIndividualController@update');	
	//FIN TEST
	//INICIO CUESTIONARIO
	Route::post('/cuestionario/perfil_academico/iniciar',
				'Alumno\Cuestionario_Perfil\PerfilAcademicoAlumnoController@iniciar');
	Route::get('/cuestionario/perfil_academico','Alumno\Cuestionario_Perfil\PerfilAcademicoAlumnoController@create');
	Route::post('/cuestionario/perfil_academico','Alumno\Cuestionario_Perfil\PerfilAcademicoAlumnoController@store');
	//FIN CUESTIONARIO
});

Route::prefix('padre')->group(function(){
	Route::get('/login','Auth\Padre_familia\PadreLoginController@showLoginForm')->name('padre.login');
	Route::post('/login','Auth\Padre_familia\PadreLoginController@login');
	//olvidaste contraseña
	Route::get('/password/reset','Auth\Padre_familia\PadreForgotPasswordController@showLinkRequestForm')
			   ->name('padre.password.request');

	Route::post('/password/email','Auth\Padre_familia\PadreForgotPasswordController@sendResetLinkEmail')
			   ->name('padre.password.email');

	Route::get('/password/reset/{token}','Auth\Padre_familia\PadreResetPasswordController@showResetForm')
				->name('padre.password.reset');
				
	Route::post('/password/reset','Auth\Padre_familia\PadreResetPasswordController@reset');
	//finContraseña
});

Route::middleware(['auth:padre'])->prefix('/padre_familia')->group(function (){
	Route::get('/', 'Padre_familia\PadreController@index');
	Route::get('/{id}/edit','Padre_familia\PadreController@edit');
	Route::post('/{id}/edit','Padre_familia\PadreController@update');
	Route::get('/{id}/domicilio', 'Domicilio\PadreDomicilioController@mostrar_domicilio');
	Route::post('/{id}/domicilio', 'Domicilio\PadreDomicilioController@seleccionar_domicilio');
	Route::post('/{id}/domicilio/{domicilio_id}/delete', 'Domicilio\PadreDomicilioController@destroy_domicilio');
	Route::get('/{id}/domicilio/registrar','Domicilio\PadreDomicilioController@create');//mostramos formulario para D
	Route::post('/domicilio/registrar','Domicilio\PadreDomicilioController@store');//agregamos domicilio
	Route::get('/{id}/parentesco','Parentesco\PadreParentescoController@create');
	Route::post('/{id}/parentesco','Parentesco\PadreParentescoController@store');
	Route::post('/{id}/parentesco/{alumno_id}/delete','Parentesco\PadreParentescoController@destroy');
	Route::post('/{id}/documento','Padre_familia\DocumentosPadreController@store');
	Route::post('/documento/{id}/delete','Padre_familia\DocumentosPadreController@destroy');
	Route::get('/ver/{id}/documento','Padre_familia\DocumentosPadreController@verDocumento');
	Route::get('/entrevista','Padre_familia\Entrevista_fresca\EntrevistaPadreController@index');
	Route::post('/entrevista','Padre_familia\Entrevista_fresca\EntrevistaPadreController@store');
	Route::get('/entrevista/{alumno_id}/secciones','Padre_familia\Entrevista_fresca\EntrevistaPadreController@secciones');
	Route::post('/entrevista/{alumno_id}/secciones','Padre_familia\Entrevista_fresca\EntrevistaPadreController@update');
	Route::get('/entrevista/{alumno_id}/marca_x','Padre_familia\Entrevista_fresca\MarcaXController@create');
	Route::post('/entrevista/{alumno_id}/marca_x','Padre_familia\Entrevista_fresca\MarcaXController@store');
	Route::get('/entrevista/{alumno_id}/marca_si_no','Padre_familia\Entrevista_fresca\MarcaSiNoController@create');
	Route::post('/entrevista/{alumno_id}/marca_si_no','Padre_familia\Entrevista_fresca\MarcaSiNoController@store');
});

Route::prefix('docente')->group(function(){
	//login
	Route::get('/login','Auth\Docente\DocenteLoginController@showLoginForm')->name('docente.login');
	Route::post('/login','Auth\Docente\DocenteLoginController@login');
	//fin login

	///Olvidaste contraseña
	Route::get('/password/reset','Auth\Docente\DocenteForgotPasswordController@showLinkRequestForm')
			   ->name('docente.password.request');
	Route::post('/password/email','Auth\Docente\DocenteForgotPasswordController@sendResetLinkEmail')
			   ->name('docente.password.email');
	Route::get('/password/reset/{token}','Auth\Docente\DocenteResetPasswordController@showResetForm')
				->name('docente.password.reset');
	Route::post('/password/reset','Auth\Docente\DocenteResetPasswordController@reset');
	//Fin
});

Route::middleware(['auth:docente'])->prefix('/docente')->group(function () {
	Route::get('/' , 'Docente\DocenteController@index'); // Muestra el panel de control para los docentes en general
	Route::get('/{id}/edit' , 'Docente\DocenteController@edit');
	Route::post('/{id}/edit' , 'Docente\DocenteController@update');
	Route::get('/{id}/domicilio','Domicilio\DocenteDomicilioController@mostrar_domicilio');//mostrar
	Route::post('/{id}/domicilio','Domicilio\DocenteDomicilioController@seleccionar_domicilio'); // agregar
	Route::post('/{docente_id}/domicilio/{domicilio_id}/delete','Domicilio\DocenteDomicilioController@destroy_domicilio');
	Route::get('/{id}/domicilio/registrar','Domicilio\DocenteDomicilioController@create');//mostrar
	Route::post('/{id}/domicilio/registrar','Domicilio\DocenteDomicilioController@store'); // agregar
	
	//DOCENTE TUTOR
	Route::get('/tutorias/encuestas' , 'Docente\tutorias\TutoriasController@encuestas_index');	
	Route::get('/tutorias/alumnos_bajo_rendimiento','Docente\tutorias\AlumnoBajoRendimientoController@index');
	Route::get('/tutorias/alumnos_bajo_rendimiento/create','Docente\tutorias\AlumnoBajoRendimientoController@create');	
	Route::post('/tutorias/alumnos_bajo_rendimiento','Docente\tutorias\AlumnoBajoRendimientoController@store');
	Route::post('/tutorias/alumnos_bajo_rendimiento/{rendimiento_id}/delete','Docente\tutorias\AlumnoBajoRendimientoController@destroy');
	Route::get('/tutorias/{rendimiento_id}/alumnos_reprobados/create','Docente\tutorias\AlumnosReprobadosController@create');
	Route::post('/tutorias/{rendimiento_id}/alumnos_reprobados','Docente\tutorias\AlumnosReprobadosController@store');
	Route::post('/tutorias/{alumno_reprobado}/alumnos_reprobados/delete','Docente\tutorias\AlumnosReprobadosController@destroy');
	//FIN TUTOR

	//REPORTE TUTORIAS
	Route::get('/tutorias/reporte_tutorias','Docente\tutorias\ReporteTutoriasController@index');
	Route::get('/tutorias/reporte_tutorias/create','Docente\tutorias\ReporteTutoriasController@create');
	Route::post('/tutorias/reporte_tutorias','Docente\tutorias\ReporteTutoriasController@store');
	Route::get('/tutorias/{reporte_id}/reporte_tutorias/edit','Docente\tutorias\ReporteTutoriasController@edit');
	Route::post('/tutorias/{reporte_id}/reporte_tutorias','Docente\tutorias\ReporteTutoriasController@update');
	Route::post('/tutorias/{reporte_id}/reporte_tutorias/delete','Docente\tutorias\ReporteTutoriasController@destroy');
	//FIN REPORTE TUTORIAS

	//SEGUIMIENTO ALUMNO RIESGO
	Route::get('/tutorias/seguimientos_alumno_riesgo','Docente\tutorias\SeguimientoRiesgoController@index');
	Route::get('/tutorias/seguimientos_alumno_riesgo/create','Docente\tutorias\SeguimientoRiesgoController@create');
	Route::post('/tutorias/seguimientos_alumno_riesgo','Docente\tutorias\SeguimientoRiesgoController@store');
	Route::get('/tutorias/seguimientos_alumno_riesgo/{seguimiento_id}/edit','Docente\tutorias\SeguimientoRiesgoController@edit');
	Route::post('/tutorias/seguimientos_alumno_riesgo/{seguimiento_id}/edit','Docente\tutorias\SeguimientoRiesgoController@update');
	Route::post('/tutorias/seguimientos_alumno_riesgo/{seguimiento_id}/delete',
				'Docente\tutorias\SeguimientoRiesgoController@destroy');
	//FIN SEGUIMIENTO ALUMNO RIESGO

	//ASESORIAS
	Route::get('/tutorias/asistencia','Docente\tutorias\ControlAsistenciaController@index');
	Route::get('/tutorias/asistencia/create','Docente\tutorias\ControlAsistenciaController@create');
	Route::post('/tutorias/asistencia','Docente\tutorias\ControlAsistenciaController@store');
	Route::get('/tutorias/{asistencia_id}/asistencia/edit','Docente\tutorias\ControlAsistenciaController@edit');
	Route::post('/tutorias/{asistencia_id}/asistencia','Docente\tutorias\ControlAsistenciaController@update');
	Route::post('/tutorias/{asistencia_id}/asistencia/delete','Docente\tutorias\ControlAsistenciaController@destroy');
	//FIN ASESORIAS


	//REPORTE GRUPAL
	Route::get('/tutorias/reporte_grupal','Docente\tutorias\ReporteGrupalController@index');
	Route::get('/tutorias/reporte_grupal/create','Docente\tutorias\ReporteGrupalController@create');
	Route::post('/tutorias/reporte_grupal','Docente\tutorias\ReporteGrupalController@store');
	Route::get('/tutorias/reporte_grupal/{reporte_id}/edit','Docente\tutorias\ReporteGrupalController@edit');
	Route::post('/tutorias/reporte_grupal/{reporte_id}/edit','Docente\tutorias\ReporteGrupalController@update');
	Route::post('/tutorias/reporte_grupal/{reporte_id}/delete','Docente\tutorias\ReporteGrupalController@destroy');
	//Fin reporte grupal

	//Mostrar los datos de las encuestas
	Route::get('/entrevista_fresca/alumno/{alumno_id}/view','Docente\tutorias\TutoriasController@entrevista_fresca_alumno');
	Route::get('/entrevista_fresca/padre_familia/alumno/{alumno_id}/view','Docente\tutorias\TutoriasController@entrevista_padre');
	Route::get('/cuestionario_anexos/alumno/{alumno_id}/view','Docente\tutorias\TutoriasController@anexos_alumno');
	Route::get('/estilos_aprendizaje/alumno/{alumno_id}/view','Docente\tutorias\TutoriasController@estilo_aprendizaje_alumno');
	Route::get('/atencion_individual/alumno/{alumno_id}/view','Docente\tutorias\TutoriasController@atencion_individual_alumno');
	Route::get('/perfil_academico/alumno/{alumno_id}/view','Docente\tutorias\TutoriasController@perfil_academico_alumno');
	//Fin de las encuestas
	//PDF
	Route::get('/entrevista_fresca_padre_familia/{alumno_id}','Docente\tutorias_Pdf\PdfController@pdf_padre');
	Route::get('/entrevista_fresca_alumno/{alumno_id}','Docente\tutorias_Pdf\PdfController@entrevista_fresca_pdf');	
	Route::get('/cuestionario_anexos/{alumno_id}','Docente\tutorias_Pdf\PdfController@cuestionario_anexos_pdf');
	Route::get('/estilos_aprendizaje/{alumno_id}','Docente\tutorias_Pdf\PdfController@estilo_aprendizaje_pdf');
	Route::get('/atencion_individual/{alumno_id}','Docente\tutorias_Pdf\PdfController@atencion_individual_pdf');
	Route::get('/atencion_individual/{alumno_id}','Docente\tutorias_Pdf\PdfController@atencion_individual_pdf');
	Route::get('/perfil_academico/{alumno_id}','Docente\tutorias_Pdf\PdfController@perfil_academico_pdf');
	Route::get('/control_asistencias/pdf','Docente\tutorias_Pdf\PdfController@control_asistencias_pdf');
	Route::get('/seguimiento_alumno/{seguimiento_id}/pdf','Docente\tutorias_Pdf\PdfController@seguimiento_alumno_pdf');
	Route::get('/reporte_grupal/pdf','Docente\tutorias_Pdf\PdfController@reporte_grupal_pdf');
	Route::get('/tutorias/{reporte_id}/reporte_tutorias_pdf','Docente\tutorias_Pdf\PdfController@reporte_tutorias_pdf');   
	//Fin pdf
});

//CRUD DIRECTOR
Route::middleware(['auth:docente'])->prefix('/director')->namespace('Director')->group(function () { 
	//DOCENTE
	Route::get('/docentes/index','docente\DocenteController@index');
	Route::get('/docente/create', 'docente\DocenteController@create');
	Route::post('/docente', 'docente\DocenteController@store'); //Mostrar la vista para crear docentes
	Route::get('/docente/{id}/edit', 'docente\DocenteController@edit'); //Identificamos que docente se va a editar
	Route::post('/docente/{id}/edit', 'docente\DocenteController@update'); //Actualizamos los datos del docente}
	Route::post('/docente/{id}/delete', 'docente\DocenteController@destroy'); //Eliminamos al docente seleccionado
	Route::get('/docente/{id}/view','docente\DocenteController@show'); //Mostrar a datos del docente (puestos y materias)
	//Asignación de puestos para el docente indicado
	Route::get('/docente/{id}/puestos', 'docente\AsignarPuestosDocenteController@index');
	Route::post('/docente/{id}/puesto','docente\AsignarPuestosDocenteController@store');	
	Route::post('/docente/{docente_id}/puesto/{puesto_id}/delete','docente\AsignarPuestosDocenteController@destroy');
	//Asignación de materias para el docente indicado
	Route::get('/docente/{id}/materias', 'docente\AsignarMateriasDocenteController@index');
	Route::post('/docente/{id}/materias', 'docente\AsignarMateriasDocenteController@store');
	Route::post('/docente/{docente_id}/materia/{materia_id}/delete', 'docente\AsignarMateriasDocenteController@destroy');
	//PUESTOS
	Route::get('/puestos/index','puesto\PuestoController@index');
	Route::get('/puestos/create','puesto\PuestoController@create');
	Route::post('/puestos/create','puesto\PuestoController@store');
	Route::get('/puestos/{id}/edit', 'puesto\PuestoController@edit');
	Route::post('/puestos/{id}/edit', 'puesto\PuestoController@update');
	Route::post('/puestos/{id}/delete', 'puesto\PuestoController@destroy');
   	//Asignacion de docentes para el puesto indicado
	Route::get('/puesto/{id}/docentes', 'puesto\PuestoController@show');
	Route::post('/puesto/{id}/docentes', 'puesto\PuestoController@agregarPuesto');
	Route::post('/puesto/{puesto_id}/docentes/{docente_id}/delete', 'puesto\PuestoController@eliminarPuesto');
	//ALUMNO	
	Route::get('/alumnos/index','alumno\AlumnoController@index');
	Route::get('/alumno/create','alumno\AlumnoController@create');
	Route::post('/alumno/create','alumno\AlumnoController@store');
	Route::get('/alumno/{nia}/edit','alumno\AlumnoController@edit');
	Route::post('/alumno/{nia}/edit','alumno\AlumnoController@update');
	Route::post('/alumno/{nia}/delete','alumno\AlumnoController@destroy');	
	Route::get('/alumno/search','buscador\SearchController@showAlumno');//Buscar un alumno 	
	Route::get('/alumno/{alumno}/show','alumno\AlumnoController@show');//Mostrar los datos del alumno	
	//Asignar parentesco de alumnos para el padre de familia indicado
	Route::get('/alumno/{nia}/familiares','alumno\AsignarFamiliarAlumnoController@index');
	Route::post('/alumno/{nia}/familiares','alumno\AsignarFamiliarAlumnoController@store');
	Route::post('/alumno/{nia}/familiares/{padre_id}/delete','alumno\AsignarFamiliarAlumnoController@destroy');
	//PADRE DE FAMILIA
	Route::get('/padres_familia/index','padre_familia\PadreFamiliaController@index');
	Route::get('/padre_familia/create','padre_familia\PadreFamiliaController@create');
	Route::post('/padre_familia/create','padre_familia\PadreFamiliaController@store');
	Route::get('/padre_familia/{id}/edit','padre_familia\PadreFamiliaController@edit');
	Route::post('/padre_familia/{id}/edit','padre_familia\PadreFamiliaController@update');
	Route::post('/padre_familia/{id}/delete','padre_familia\PadreFamiliaController@destroy');
	//Buscar padre de familia
	Route::get('/padre_familia/search','buscador\SearchController@showPadre');
	//Mostrar los datos del padre de familia
	Route::get('/padre_familia/{id}/show','padre_familia\PadreFamiliaController@show');	
	//Descargar y ver documento
	Route::get('/download/{id}/documento','padre_familia\PadreFamiliaController@downloadDocumento');
	Route::get('/ver/{id}/documento','padre_familia\PadreFamiliaController@verDocumento');
	//Asignar parentesco de alumnos para el padre de familia indicado
	Route::get('/padre_familia/{id}/alumnos','padre_familia\AsignarAlumnosPadreController@index');
	Route::post('/padre_familia/{id}/alumnos','padre_familia\AsignarAlumnosPadreController@store');
	Route::post('/padre_familia/{padre_id}/alumnos/{alumno_id}/delete','padre_familia\AsignarAlumnosPadreController@destroy');
	//MATERIAS
	Route::get('/materias/index', 'materia\MateriaController@index');
	Route::get('/materia/create', 'materia\MateriaController@create');
	Route::post('/materia/create', 'materia\MateriaController@store');
	Route::get('/materia/{id}/edit', 'materia\MateriaController@edit');
	Route::post('/materia/{id}/edit', 'materia\MateriaController@update');
	Route::post('/materia/{id}/delete', 'materia\MateriaController@destroy');
	//Asignar docentes para la materia indicada	
	Route::get('/materia/{id}/docentes','materia\AsignarMateriasController@index'); //Mostrar vista para asignar materia
	Route::post('/materia/{id}/docentes','materia\AsignarMateriasController@store');//Asignar materia a los docentes
	//quitar materia asignada para el docente
	Route::post('/materia/{materia_id}/docentes/{docente_id}/delete','materia\AsignarMateriasController@destroy'); 
	//Agregar direcciones
	Route::get('/domicilios/index','domicilio\DomicilioController@index');
	Route::get('/domicilio/create','domicilio\DomicilioController@create');
	Route::post('/domicilio/create','domicilio\DomicilioController@store');
	Route::get('/domicilio/{id}/edit', 'domicilio\DomicilioController@edit');
	Route::post('/domicilio/{id}/edit', 'domicilio\DomicilioController@update');
	Route::post('/domicilio/{id}/delete', 'domicilio\DomicilioController@destroy');
	//Asignar domicilio para Docente, Alumno y Padre
	Route::get('/padre_familia/{id}/domicilio', 'domicilio\AsignarDomicilioController@padre_create');
	Route::post('/padre_familia/{id}/domicilio', 'domicilio\AsignarDomicilioController@padre_store');
	Route::post('/padre_familia/{padre_id}/domicilio/{domicilio_id}/delete', 'domicilio\AsignarDomicilioController@padre_destroy');
	//Alumno
	Route::get('/alumno/{nia}/domicilio', 'domicilio\AsignarDomicilioController@alumno_create');//Mostrar la vista
	Route::post('/alumno/{nia}/domicilio', 'domicilio\AsignarDomicilioController@alumno_store');//Agregar el domicilio
	Route::post('/alumno/{nia}/domicilio/{domicilio_id}/delete', 'domicilio\AsignarDomicilioController@alumno_destroy');
	//Docente
	Route::get('/docente/{id}/domicilio','domicilio\AsignarDomicilioController@docente_create');
	Route::post('/docente/{id}/domicilio','domicilio\AsignarDomicilioController@docente_store');
	Route::post('/docente/{docente_id}/domicilio/{domicilio_id}/delete','domicilio\AsignarDomicilioController@docente_destroy');
	//Grupo
	Route::get('/grupos/index','grupo\GrupoController@index');
	Route::get('/grupos/create','grupo\GrupoController@create');
	Route::post('/grupos/create','grupo\GrupoController@store');
	Route::get('/grupo/{id}/edit','grupo\GrupoController@edit');
	Route::post('/grupo/{id}/edit','grupo\GrupoController@update');
	Route::post('/grupo/{id}/delete', 'grupo\GrupoController@destroy');
	//Mostrar el grupo seleccionado
	Route::get('/grupo/{grupo}/alumnos/show', 'grupo\GrupoController@alumnos_show');
	Route::post('/grupo/{grupo_id}/alumno/{alumno_id}/delete', 'grupo\GrupoController@alumno_destroy');
	Route::get('/grupo/{grupo}/materias/show', 'grupo\GrupoMateriasController@show');	
	Route::get('/grupo/{id}/materias', 'grupo\GrupoMateriasController@create');
	Route::post('/grupo/{id}/materias', 'grupo\GrupoMateriasController@store');	
	Route::post('/grupo/{grupo_id}/materia/{materia_id}/delete', 'grupo\GrupoMateriasController@materia_destroy');
});