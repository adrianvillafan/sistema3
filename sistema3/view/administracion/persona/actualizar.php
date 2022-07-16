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
            <li><a href="index.php?c=Persona">Persona</a></li>
            <li class="active">Actualizar</li>
          </ol>
</section>
<?php
 if (!isset($_REQUEST['idPersona'])==''){
$Persona= $this->Consultar($_REQUEST['idPersona']);
  ?>




<section class="content">
	<div class="row">
		<div class="col-sm-12 col-md-8 col-md-offset-2">
	  		<div class="box">
	    		<div class='box-header with-border'>
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Actualizar Persona</h3>
	    		</div>
	    		<div class="box-body">
	    			<form id="frmActualizarPersona" action="?c=Persona&a=Actualizar" method="post" enctype="multipart/form-data" role="form">
	    				<input type="hidden" name="idPersona" value="<?php echo $Persona->__GET('idPersona'); ?>" /> 
					    <div class="form-group col-md-3">
					        <label for="primer_nombre">Primer Nombre</label>
					        <input type="text" id="primer_nombre" name="primer_nombre" value="<?php echo $Persona->__GET('primer_nombre'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="segundo_nombre">Segundo Nombre</label>
					        <input type="text" id="segundo_nombre" name="segundo_nombre" value="<?php echo $Persona->__GET('segundo_nombre'); ?>" class="form-control" placeholder=""  required />
					    </div>					   
					    <div class="form-group col-md-3">
					        <label for="apellido_paterno">Apellido Paterno</label>
					        <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo $Persona->__GET('apellido_paterno'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="apellido_materno">Apellido Materno</label>
					        <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo $Persona->__GET('apellido_materno'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="dni">DNI</label>
					        <input type="text" id="dni"name="dni" value="<?php echo $Persona->__GET('dni'); ?>" class="form-control" placeholder=""  required disabled/>
					    </div>
					    <div class="form-group col-md-3">
					        <label for="codigo">Codigo</label>
					        <input type="text" id="codigo" name="codigo" value="<?php echo $Persona->__GET('codigo'); ?>" class="form-control" placeholder=""  required disabled/>
					    </div>
					    <div class="form-group col-md-3">
					        <label for="celular">Celular</label>
					        <input type="text" id="celular" name="celular" value="<?php echo $Persona->__GET('celular'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="fecha_ingreso">Fecha Ingreso</label>
					        <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $Persona->__GET('fecha_ingreso'); ?>" class="form-control" placeholder=""  required disabled/>
					    </div>
					    <div class="form-group col-md-3">
					        <label for="sexo">Sexo</label>					   
					        <select  type="text" id="sexo" name="sexo"  class="form-control" placeholder=""  required />			
					        	<option value="M">M</option>
					        	<option value="F">F</option>
					        </select>
					    </div>
					    <div class="form-group col-md-3">
					        <label for="fecha_nacimiento">Fecha Nacimiento</label>
					        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $Persona->__GET('fecha_nacimiento'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="tipo_horario">Tipo Horario</label>
					        <select  type="text" id="tipo_horario" name="tipo_horario"  class="form-control" placeholder=""  required />	
					        	<option value="Full Time">Full Time</option>
					        	<option value="Part Time">Part Time</option>
					        	<option value="Comisionista">Comisionista</option>
					        	<option value="Práctica">Práctica</option>
					        </select>
					    </div>
					    <div class="form-group col-md-3">
					        <label for="horario_entrada">Hora Entrada</label>
					        <input type="time" id="horario_entrada" name="horario_entrada" value="<?php echo $Persona->__GET('horario_entrada'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="horario_salida">Horario Salida</label>
					        <input type="time" id="horario_salida" name="horario_salida" value="<?php echo $Persona->__GET('horario_salida'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="correo">Correo Corporativo</label>
					        <input type="text" id="correo" name="correo" value="<?php echo $Persona->__GET('correo'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label>Fecha Salida</label>
					        <input type="date" id="fecha_salida" name="fecha_salida" value="<?php echo $Persona->__GET('fecha_salida'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    					    
					    <div class="form-group col-md-12">
					      <label>Activo</label>
					      <label class="radio-inline">
					          <input type="radio" name="activo" id="estado_activo" value="1" <?php if ($Persona->__GET('activo')==1) { echo 'checked';  } ?>> SI
					      </label>
					      <label class="radio-inline">
					          <input type="radio" name="activo" id="estado_inactivo" value="0" <?php if ($Persona->__GET('activo')==0) { echo 'checked'; }  ?>> NO
					      </label>					    
					    </div>
					  

					  <div class="col-md-12" style="margin-top:2em;">
					    <div class="col-md-6 col-sm-12">
					        
					        <button type="button" id="btnSubmit" class="btn btn-primary col-md-12 col-xs-12"><i class="fa fa-save"></i> Actualizar</button>    
					      
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
		$('#sexo').val("<?php echo $Persona->__GET('sexo'); ?>");
		$('#tipo_horario').val("<?php echo $Persona->__GET('tipo_horario'); ?>");
		
		
		$("#btnSubmit").click(function(event) {

			bootbox.dialog({
	            message: "¿Estas seguro de actualizar?",
	            title: "Actualizar Persona",
	            buttons: {
	                main: {
	                    label: "Actualizar",
	                    className: "btn-primary",
	                    callback: function() {
	                        //console.log('Eliminado al usuario');
	                        
	                              $( "#frmActualizarPersona" ).submit();
	                         

	                       
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




	});


	function PrimeraLetraMayuscula(string){
		var capitalize=string.toLowerCase();
  		return capitalize.charAt(0).toUpperCase() + capitalize.slice(1);
	}




</script>
<?php }/*--- END REQUESt*/ ?>