 <!-- Content Header (Page header) -->
<section class="content-header">  
	<h1>
		Modulo Administracion
	</h1>
	<ol class="breadcrumb">
		<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>           
	    <li class="active">Auniversidad</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
	  		<div class="box">
	    		<div class='box-header with-border'>
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Lista de Auniversidads</h3> 
	      			<a class="btn btn-sm btn-primary pull-right" href="?c=Auniversidad&a=v_Registrar"> Nueva Auniversidad</a>
	    		</div>
	    		<div class="box-body box-body_table">
	    		 <?php  $auniversidads = $this->Listar();  ?>
                  	<table id="TablaEntidad" class="table table-bordered table-hover dataTable no-footer" width="100%">
	                    <thead>
	                      	<tr>                      
		                    	<th>ID</th>                    

			                    <th style="vertical-align: middle;">Codigo</th>
			                    <th style="vertical-align: middle;">nombre</th>
			                    <th style="vertical-align: middle;">direccion</th>
			                  
			                    <th style="vertical-align: middle;">cantidad_carreras</th>
			                    <th style="vertical-align: middle;">Estado</th>
			                    <th style="vertical-align: middle;">Acciones</th>
	                     	</tr>
	                    </thead>
	                    <tbody>
	                    	<?php foreach ($auniversidads as $auniversidad): ?>
	                    	<tr>
	                    		<td><?php echo $auniversidad['idAuniversidad']; ?></td>

	                    		<td><?php echo $auniversidad['codigo'] ; ?></td>
	                    		<td><?php echo $auniversidad['nombre']; ?></td>
	                    		<td><?php echo $auniversidad['direccion']; ?></td>
	                    		
	                    		<td><?php echo $auniversidad['cantidad_carreras']; ?></td>
	                    		<?php if ($auniversidad['activo']==1): ?>
                                <td class=""><span class="label label-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> Activo</span></td>
                                <?php else: ?>
                                <td class=""><span class="label label-danger"><i class="fa fa-square-o" aria-hidden="true"></i> Inactivo</span></td>
                                <?php endif ?>
                            	<td class="a_center">                            		
                            		<a href="?c=Auniversidad&a=v_Actualizar&idAuniversidad=<?php echo $auniversidad['idAuniversidad']; ?>" class="btn btn-primary btn-xs " data-toggle="tooltip" data-placement="top" title="Actualizar">
                                   		<i class="fa fa-pencil"></i>   
                               		</a>
                               		<a class="btn btn-danger btn-xs EliminarAuniversidad" data-id="<?php echo $auniversidad['idAuniversidad']; ?>" data-Auniversidad="<?php echo $auniversidad['nombre']; ?>" data-toggle="tooltip" data-placement="top" title="Eliminar">
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
		$(".EliminarAuniversidad").click(function(event) {
			idAuniversidad=$(this).attr('data-id');
			bootbox.dialog({
            message: "¿Estas seguro de eliminar a <b>"+$(this).attr('data-auniversidad')+"</b>?",
            title: "Eliminar Auniversidad",
            buttons: {
                main: {
                    label: "Eliminar",
                    className: "btn-primary",
                    callback: function() {
                        //console.log('Eliminado al usuario');
                        window.location.href = "?c=Auniversidad&a=Eliminar&idAuniversidad="+idAuniversidad;
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

