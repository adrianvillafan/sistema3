
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
            <li><a href="index.php?c=Origen">Origen de Información</a></li>
            <li class="active">Registrar</li>
          </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-sm-12 col-md-8 col-md-offset-2">
	  		<div class="box">
	    		<div class='box-header with-border'>
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Registrar Auniversidad</h3>
	    		</div>
	    		<div class="box-body">
	    			<form id="frmRegistrarAuniversidad"  action="?c=Auniversidad&a=Registrar" method="post" enctype="multipart/form-data" role="form">	   				

					    <div class="form-group col-md-3 formulario__grupo formulario__grupo-correcto" id="grupo__idAuniversidad" >
					        <label for="idAuniversidad" class="formulario__label">Primer Nombre</label>
					        	<div class="formulario__grupo-input">
					        		<input type="text" id="idAuniversidad" name="idAuniversidad" value="" class="form-control  formulario__input" placeholder=""  required />
					        	</div> 	
					    </div>


					    <div class="form-group col-md-3">
					        <label for="codigo">codigo</label>
					        <input type="text" id="codigo" name="codigo" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>					   
					    <div class="form-group col-md-3">
					        <label for="nombre">nombre</label>
					        <input type="text" id="nombre" name="nombre" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="direccion">direccion</label>
					        <input type="text" id="direccion"name="direccion" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="licenciado">licenciado</label>
					        <input type="number" id="licenciado" name="licenciado" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    
					    <div class="form-group col-md-3">
					        <label for="cantidad_carreras">cantidad_carreras</label>
					        <input type="number" id="cantidad_carreras" name="cantidad_carreras" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>
					    
					  	<div class="col-md-12" style="margin-top:2em;">
					  		<div class="col-md-6 col-sm-12">
					        <button type="button" id="btnSubmit" class="btn btn-primary col-md-12 col-xs-12" disable><i class="fa fa-save"></i> Registrar</button>    		      
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
	            message: "¿Estas seguro de Registrar?",
	            title: "Registrar Auniversidad",
	            buttons: {
	                main: {
	                    label: "Registrar",
	                    className: "btn-primary",
	                    callback: function() {
	                        //console.log('Eliminado al usuario');
	                        
	                              $( "#frmRegistrarAuniversidad" ).submit();
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

		$("#idAuniversidad").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#segundo_nombre").focusout(function() {
  			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});

		$("#codigo").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#nombre").focusout(function() {
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


</script>

