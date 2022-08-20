 <!-- Content Header (Page header) -->
<?php 
require_once 'controller/auniversidad.controller.php';

$auniversidad = new AuniversidadController;	

?>


<section class="content-header">  
	<h1>
		Modulo Administracion
	</h1>
	<ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="index.php?c=Auniversidad">Auniversidad</a></li>
            <li class="active">Actualizar</li>
          </ol>
</section>
<?php
 if (!isset($_REQUEST['idAuniversidad'])==''){
$Auniversidad= $this->Consultar($_REQUEST['idAuniversidad']);
  ?>




<section class="content">
	<div class="row">
		<div class="col-sm-12 col-md-8 col-md-offset-2">
	  		<div class="box">
	    		<div class='box-header with-border'>
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Actualizar Auniversidad</h3>
	    		</div>
	    		<div class="box-body">
	    			<form id="frmActualizarAuniversidad" action="?c=Auniversidad&a=Actualizar" method="post" enctype="multipart/form-data" role="form">
	    				<input type="hidden" name="codigo" value="<?php echo $Auniversidad->__GET('idAuniversidad'); ?>" /> 
					    <div class="form-group col-md-3">
					        <label for="codigo">codigo</label>
					        <input type="text" id="codigo" name="codigo" value="<?php echo $Auniversidad->__GET('codigo'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="nombre">nombre</label>
					        <input type="text" id="nombre" name="nombre" value="<?php echo $Auniversidad->__GET('nombre'); ?>" class="form-control" placeholder=""  required />
					    </div>					   
					    <div class="form-group col-md-3">
					        <label for="direccion">direccion</label>
					        <input type="text" id="direccion" name="direccion" value="<?php echo $Auniversidad->__GET('direccion'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="licenciado">licenciado</label>
					        <input type="number" id="licenciado"name="licenciado" value="<?php echo $Auniversidad->__GET('licenciado'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="cantidad_carreras">cantidad_carreras</label>
					        <input type="number" id="cantidad_carreras" name="cantidad_carreras" value="<?php echo $Auniversidad->__GET('cantidad_carreras'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    
					    

						<div class="form-group col-md-12">
					      <label>Activo</label>
					      <label class="radio-inline">
					          <input type="radio" name="activo" id="estado_activo" value="1" <?php if ($Auniversidad->__GET('activo')==1) { echo 'checked';  } ?>> SI
					      </label>
					      <label class="radio-inline">
					          <input type="radio" name="activo" id="estado_inactivo" value="0" <?php if ($Auniversidad->__GET('activo')==0) { echo 'checked'; }  ?>> NO
					      </label>					    
					    </div>
					  

					  <div class="col-md-12" style="margin-top:2em;">
					    <div class="col-md-6 col-sm-12">
					        
					        <button type="button" id="btnSubmit" class="btn btn-primary col-md-12 col-xs-12"><i class="fa fa-save"></i> Actualizar</button>    
					      
					    </div>
					     <div class="col-md-6 col-sm-12">

					       
					    
					        <a href="index.php?c=Auniversidad" class="btn btn-danger col-md-12 col-xs-12 "><i class="fa fa-times-circle"></i> Cancelar</a>
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
	            title: "Actualizar Auniversidad",
	            buttons: {
	                main: {
	                    label: "Actualizar",
	                    className: "btn-primary",
	                    callback: function() {
	                        //console.log('Eliminado al usuario');
	                        
	                              $( "#frmActualizarAuniversidad" ).submit();
	                         

	                       
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



		$("#codigo").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#segundo_nombre").focusout(function() {
  			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});

		$("#nombre").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#direccion").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#PrimNomyApePat").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});




	});






</script>
<?php }/*--- END REQUESt*/ ?>