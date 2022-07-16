 <!-- Content Header (Page header) -->
<?php 
require_once 'controller/alumno.controller.php';

$alumno = new AlumnoController;	

?>


<section class="content-header">  
	<h1>
		Modulo Administracion
	</h1>
	<ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="index.php?c=Alumno">Alumno</a></li>
            <li class="active">Actualizar</li>
          </ol>
</section>
<?php
 if (!isset($_REQUEST['idAlumno'])==''){
$Alumno= $this->Consultar($_REQUEST['idAlumno']);
  ?>




<section class="content">
	<div class="row">
		<div class="col-sm-12 col-md-8 col-md-offset-2">
	  		<div class="box">
	    		<div class='box-header with-border'>
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Actualizar Alumno</h3>
	    		</div>
	    		<div class="box-body">
	    			<form id="frmActualizarAlumno" action="?c=Alumno&a=Actualizar" method="post" enctype="multipart/form-data" role="form">
	    				<input type="hidden" name="idAlumno" value="<?php echo $Alumno->__GET('idAlumno'); ?>" /> 
					    <div class="form-group col-md-3">
					        <label for="primer_nombre">Primer Nombre</label>
					        <input type="text" id="primer_nombre" name="primer_nombre" value="<?php echo $Alumno->__GET('primer_nombre'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="apellido_paterno">Apellido Paterno</label>
					        <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo $Alumno->__GET('apellido_paterno'); ?>" class="form-control" placeholder=""  required />
					    </div>					   
					    <div class="form-group col-md-3">
					        <label for="apellido_materno">Apellido Materno</label>
					        <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo $Alumno->__GET('apellido_materno'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="edad">Edad</label>
					        <input type="number" id="edad"name="edad" value="<?php echo $Alumno->__GET('edad'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="dni">DNI</label>
					        <input type="number" id="dni" name="dni" value="<?php echo $Alumno->__GET('dni'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    
					    <div class="form-group col-md-3">
					        <label for="fecha_nacimiento">fecha_nacimiento</label>
					        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $Alumno->__GET('fecha_nacimiento'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="curso">curso</label>
					        <input type="text" id="curso" name="curso" value="<?php echo $Alumno->__GET('curso'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="carrera">carrera</label>
					        <input type="text" id="carrera" name="carrera" value="<?php echo $Alumno->__GET('carrera'); ?>" class="form-control" placeholder=""  required />
					    </div>

						<div class="form-group col-md-12">
					      <label>Activo</label>
					      <label class="radio-inline">
					          <input type="radio" name="activo" id="estado_activo" value="1" <?php if ($Alumno->__GET('activo')==1) { echo 'checked';  } ?>> SI
					      </label>
					      <label class="radio-inline">
					          <input type="radio" name="activo" id="estado_inactivo" value="0" <?php if ($Alumno->__GET('activo')==0) { echo 'checked'; }  ?>> NO
					      </label>					    
					    </div>
					  

					  <div class="col-md-12" style="margin-top:2em;">
					    <div class="col-md-6 col-sm-12">
					        
					        <button type="button" id="btnSubmit" class="btn btn-primary col-md-12 col-xs-12"><i class="fa fa-save"></i> Actualizar</button>    
					      
					    </div>
					     <div class="col-md-6 col-sm-12">

					       
					    
					        <a href="index.php?c=Alumno" class="btn btn-danger col-md-12 col-xs-12 "><i class="fa fa-times-circle"></i> Cancelar</a>
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
	            message: "¿Estas seguro de actualizar?",
	            title: "Actualizar Alumno",
	            buttons: {
	                main: {
	                    label: "Actualizar",
	                    className: "btn-primary",
	                    callback: function() {
	                        //console.log('Eliminado al usuario');
	                        
	                              $( "#frmActualizarAlumno" ).submit();
	                         

	                       
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






</script>
<?php }/*--- END REQUESt*/ ?>