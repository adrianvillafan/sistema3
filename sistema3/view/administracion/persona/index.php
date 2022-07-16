 <!-- Content Header (Page header) -->
<section class="content-header">  
	<h1>
		Modulo Administracion
	</h1>
	<ol class="breadcrumb">
		<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>           
	    <li class="active">Personal</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
	  		<div class="box">
	    		<div class='box-header with-border'>
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Lista de Personas</h3> 
	      			<a class="btn btn-sm btn-primary pull-right" href="?c=Persona&a=v_Registrar"> Nueva Persona</a>
	    		</div>
	    		<div class="box-body box-body_table">
	    		 <?php  $personas = $this->Listar();  ?>
                  	<table id="TablaEntidad" class="table table-bordered table-hover dataTable no-footer" width="100%">
	                    <thead>
	                      	<tr>                      
		                    	<th>ID</th>                    
			                    <th style="vertical-align: middle;">Codigo</th>
			                    <th style="vertical-align: middle;">Nombres y Apellidos</th>
			                    <th style="vertical-align: middle;">Celular</th>
			                    <th style="vertical-align: middle;">Correo Corporativo</th>
			                  
			                    <th style="vertical-align: middle;">Tipo Horario</th>
			                    <th style="vertical-align: middle;">Estado</th>
			                    <th style="vertical-align: middle;">Acciones</th>
	                     	</tr>
	                    </thead>
	                    <tbody>
	                    	<?php foreach ($personas as $persona): ?>
	                    	<tr>
	                    		<td><?php echo $persona['idPersona']; ?></td>
	                    		<td><?php echo $persona['codigo']; ?></td>
	                    		<td><?php echo ucwords(strtolower($persona['apellido_paterno'])).' '.$persona['apellido_materno'].' '.$persona['primer_nombre'].' '.$persona['segundo_nombre']; ?></td>
	                    		<td><?php echo $persona['celular']; ?></td>
	                    		<td><?php echo $persona['correo']; ?></td>
	                    		
	                    		<td><?php echo $persona['tipo_horario']; ?></td>
	                    		<?php if ($persona['activo']==1): ?>
                                <td class=""><span class="label label-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> Activo</span></td>
                                <?php else: ?>
                                <td class=""><span class="label label-danger"><i class="fa fa-square-o" aria-hidden="true"></i> Inactivo</span></td>
                                <?php endif ?>
                            	<td class="a_center">                            		
                            		<a href="?c=Persona&a=v_Actualizar&idPersona=<?php echo $persona['idPersona']; ?>" class="btn btn-primary btn-xs " data-toggle="tooltip" data-placement="top" title="Actualizar">
                                   		<i class="fa fa-pencil"></i>   
                               		</a>
                               		<a class="btn btn-danger btn-xs EliminarPersona" data-id="<?php echo $persona['idPersona']; ?>" data-persona="<?php echo $persona['apellido_paterno'].' '.$persona['apellido_materno'].' '.$persona['primer_nombre'].' '.$persona['segundo_nombre']; ?>" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                   		<i class="fa fa-trash"></i>   
                               		</a>

                               	</td>
	                    	</tr>
	                    	<?php endforeach; ?>
	                    </tbody>
                	</table>                    
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<!-- /. Ventana Modal Foto de Perfil-->

<!-- /.Ventana Modal Foto de Perfil -->
<script>
	
	$(document).ready(function() {
		$(".EliminarPersona").click(function(event) {
			idPersona=$(this).attr('data-id');
			bootbox.dialog({
            message: "¿Estas seguro de eliminar a <b>"+$(this).attr('data-persona')+"</b>?",
            title: "Eliminar Persona",
            buttons: {
                main: {
                    label: "Eliminar",
                    className: "btn-primary",
                    callback: function() {
                        //console.log('Eliminado al usuario');
                        window.location.href = "?c=Persona&a=Eliminar&idPersona="+idPersona;
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
	});


</script>

