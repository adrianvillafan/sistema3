
<!-- Content Header (Page header) -->
<?php 
require_once 'controller/persona.controller.php';

$persona = new PersonaController;	
$personas = $persona->ListarPersonalTI(1); 
 ?>
<section class="content-header">  
	<h1>
		Modulo Administracion
	</h1>
	<ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="index.php?c=Origen">Origen de Información</a></li>
            <li class="active">Registrar</li>
          </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-sm-12 col-md-8 col-md-offset-2">
	  		<div class="box">
	    		<div class='box-header with-border'>
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Registrar Persona</h3>
	    		</div>
	    		<div class="box-body">
	    			<form id="frmRegistrarPersona"  action="?c=Persona&a=Registrar" method="post" enctype="multipart/form-data" role="form">	   				

					    <div class="form-group col-md-3 formulario__grupo formulario__grupo-correcto" id="grupo__primer_nombre" >
					        <label for="primer_nombre" class="formulario__label">Primer Nombre</label>
					        	<div class="formulario__grupo-input">
					        		<input type="text" id="primer_nombre" name="primer_nombre" value="" class="form-control  formulario__input" placeholder=""  required />
					        	</div> 	
					    </div>


					    <div class="form-group col-md-3">
					        <label for="segundo_nombre">Segundo Nombre</label>
					        <input type="text" id="segundo_nombre" name="segundo_nombre" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>					   
					    <div class="form-group col-md-3">
					        <label for="apellido_paterno">Apellido Paterno</label>
					        <input type="text" id="apellido_paterno" name="apellido_paterno" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="apellido_materno">Apellido Materno</label>
					        <input type="text" id="apellido_materno"name="apellido_materno" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="dni">DNI</label>
					        <input type="text" id="dni" name="dni" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    
					    <div class="form-group col-md-3">
					        <label for="celular">Celular</label>
					        <input type="text" id="celular" name="celular" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="fecha_ingreso">Fecha Ingreso</label>
					        <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="fecha_nacimiento">Fecha Nacimiento</label>
					        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="sexo">Sexo</label>
					        <select  type="text" id="sexo" name="sexo"  class="form-control formulario__input" placeholder=""  required />
					        	<option value="M">M</option>
					        	<option value="F">F</option>
					        </select>
					    </div>
					    <div class="form-group col-md-3">
					        <label for="tipo_horario">Tipo Horario</label>
					        <select  type="text" id="tipo_horario" name="tipo_horario"  class="form-control formulario__input" placeholder=""  required />
					        	<option value="Full Time">Full Time</option>
					        	<option value="Part Time">Part Time</option>
					        	<option value="Comisionista">Comisionista</option>
					        	<option value="Práctica">Práctica</option>
					        </select>
					    </div>
					    <div class="form-group col-md-3">
					        <label for="horario_entrada">Hora Entrada</label>
					        <input type="time" id="horario_entrada" name="horario_entrada" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="horario_salida">Horario Salida</label>
					        <input type="time" id="horario_salida" name="horario_salida" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="correo">Correo Corporativo</label>
					        <input type="text" id="correo" name="correo" value="" class="form-control formulario__input" placeholder="corre@jpusoluciones.com"  required />
					    </div>
					  	<div class="col-md-12" style="margin-top:2em;">
					  		<div class="col-md-6 col-sm-12">
					        <button type="button" id="btnSubmit" class="btn btn-primary col-md-12 col-xs-12" disable><i class="fa fa-save"></i> Registrar</button>    		      
					    </div>
					     <div class="col-md-6 col-sm-12">					    
					        <a href="index.php?c=Persona" class="btn btn-danger col-md-12 col-xs-12 "><i class="fa fa-times-circle"></i> Cancelar</a>
					    </div>  
					  </div>
					</form> 
                </div>      
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script>
          
	$(document).ready(function() {
		$("#btnSubmit").click(function(event) {



			bootbox.dialog({
	            message: "¿Estas seguro de Registrar?",
	            title: "Registrar Persona",
	            buttons: {
	                main: {
	                    label: "Registrar",
	                    className: "btn-primary",
	                    callback: function() {
	                        //console.log('Eliminado al usuario');
	                        
	                              $( "#frmRegistrarPersona" ).submit();
	                    }
	                },
	                danger: {
	                    label: "Cancelar",
	                    className: "btn-danger",
	                    callback: function() {
	                        bootbox.hideAll();
	                    }
	                }
	            }
        	}); 
		});

		$("#primer_nombre").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#segundo_nombre").focusout(function() {
  			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});

		$("#apellido_paterno").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#apellido_materno").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#PrimNomyApePat").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});



		$( "#Area_id" ).change(function ()
 		{
			Area_id = $("#Area_id").val();
			//alert(Area_id);

			ListarCargoxArea_id(Area_id)

		});

	});

	function PrimeraLetraMayuscula(string){
		var capitalize=string.toLowerCase();
  		return capitalize.charAt(0).toUpperCase() + capitalize.slice(1);
	}

	function ListarCargoxArea_id(Area_id){
	    $.ajax({
	      	type: "POST",
	      	url: 'index.php?c=Cargo&a=ListarxArea_id_ajax',
	      	data:{
	      		Area_id:Area_id
	      	},
	      	//sync:false,           
	      	success: function(data) {
	        	//console.log(data);
	          	var html = "";
	          	$("#Cargo_id").find("option").remove();                 
	          	$.each(data, function(index, value) { 
	            	html += '<option value="'+value.idCargo+'">'+value.nombre+'</option>';
	          	});
	        	$("#Cargo_id").append('<option value="0">-- Seleccionar Cargo --</option>');        
	          	$("#Cargo_id").append(html);  
	        },
	      	dataType: 'json'
	  	});
	}

</script>

