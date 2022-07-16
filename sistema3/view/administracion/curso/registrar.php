
<!-- Content Header (Page header) -->
<?php 
require_once 'controller/curso.controller.php';

$curso = new CursoController;	
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
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Registrar Curso</h3>
	    		</div>
	    		<div class="box-body">
	    			<form id="frmRegistrarCurso"  action="?c=Curso&a=Registrar" method="post" enctype="multipart/form-data" role="form">	   				

					    <div class="form-group col-md-3 formulario__grupo formulario__grupo-correcto" id="grupo__primer_nombre" >
					        <label for="primer_nombre" class="formulario__label">Nombre</label>
					        	<div class="formulario__grupo-input">
					        		<input type="text" id="nombre" name="nombre" value="" class="form-control  formulario__input" placeholder=""  required />
					        	</div> 	
					    </div>


					    <div class="form-group col-md-3">
					        <label for="segundo_nombre">Profesor</label>
					        <input type="text" id="profesor" name="profesor" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>					   
					    
					  	<div class="col-md-12" style="margin-top:2em;">
					  		<div class="col-md-6 col-sm-12">
					        <button type="button" id="btnSubmit" class="btn btn-primary col-md-12 col-xs-12" disable><i class="fa fa-save"></i> Registrar</button>    		      
					    </div>
					     <div class="col-md-6 col-sm-12">					    
					        <a href="index.php?c=Curso" class="btn btn-danger col-md-12 col-xs-12 "><i class="fa fa-times-circle"></i> Cancelar</a>
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
	            title: "Registrar Curso",
	            buttons: {
	                main: {
	                    label: "Registrar",
	                    className: "btn-primary",
	                    callback: function() {
	                        //console.log('Eliminado al usuario');
	                        
	                              $( "#frmRegistrarCurso" ).submit();
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

