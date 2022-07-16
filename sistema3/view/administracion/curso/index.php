 <!-- Content Header (Page header) -->
<section class="content-header">  
	<h1>
		Modulo Administracion
	</h1>
	<ol class="breadcrumb">
		<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>           
	    <li class="active">Cursol</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
	  		<div class="box">
	    		<div class='box-header with-border'>
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Lista de Cursos</h3> 
	      			<a class="btn btn-sm btn-primary pull-right" href="?c=Curso&a=v_Registrar"> Nueva Curso</a>
	    		</div>
	    		<div class="box-body box-body_table">
	    		 <?php  $cursos = $this->Listar();  ?>
                  	<table id="TablaEntidad" class="table table-bordered table-hover dataTable no-footer" width="100%">
	                    <thead>
	                      	<tr>                      
		                    	<th>ID</th>                    
			                    <th style="vertical-align: middle;">Nombre Curso</th>
			                    <th style="vertical-align: middle;">Profesor</th>

			                    <th style="vertical-align: middle;">Estado</th>
			                    <th style="vertical-align: middle;">Acciones</th>
	                     	</tr>
	                    </thead>
	                    <tbody>
	                    	<?php foreach ($cursos as $curso): ?>
	                    	<tr>
	                    		<td><?php echo $curso['idCurso']; ?></td>
	                    		<td><?php echo $curso['nombre']; ?></td>
	                    		<td><?php echo $curso['profesor']; ?></td>
	                    		
	                    		<?php if ($curso['activo']==1): ?>
                                <td class=""><span class="label label-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> Activo</span></td>
                                <?php else: ?>
                                <td class=""><span class="label label-danger"><i class="fa fa-square-o" aria-hidden="true"></i> Inactivo</span></td>
                                <?php endif ?>
                            	<td class="a_center">                            		
                            		<a href="?c=Curso&a=v_Actualizar&idCurso=<?php echo $curso['idCurso']; ?>" class="btn btn-primary btn-xs " data-toggle="tooltip" data-placement="top" title="Actualizar">
                                   		<i class="fa fa-pencil"></i>   
                               		</a>
                               		<a class="btn btn-danger btn-xs EliminarCurso" data-id="<?php echo $curso['idCurso']; ?>" data-curso="<?php echo $curso['nombre']; ?>" data-toggle="tooltip" data-placement="top" title="Eliminar">
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
		$(".EliminarCurso").click(function(event) {
			idCurso=$(this).attr('data-id');
			bootbox.dialog({
            message: "¿Estas seguro de eliminar a <b>"+$(this).attr('data-curso')+"</b>?",
            title: "Eliminar Curso",
            buttons: {
                main: {
                    label: "Eliminar",
                    className: "btn-primary",
                    callback: function() {
                        //console.log('Eliminado al usuario');
                        window.location.href = "?c=Curso&a=Eliminar&idCurso="+idCurso;
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

