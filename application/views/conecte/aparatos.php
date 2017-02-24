<?php

if(!$results){?>
<a href="<?php echo base_url();?>index.php/conecte/apcrear" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Equipo</a>
	<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tasks"></i>
         </span>
        <h5>Mis Equipos</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">            
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Nº de Serie</th>            
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="6">Ningun equipo registrado</td>
        </tr>
    </tbody>
</table>
</div>
</div>
<?php } else{?>

<a href="<?php echo base_url();?>index.php/conecte/apcrear" class="btn btn-success"><i class="icon-plus icon-white"></i> Registrar Equipo</a>
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tasks"></i>
         </span>
        <h5>Mis Equipos</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Nº de Serie</th>            
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';            
            echo '<td>'.$r->nombre.'</td>';
            echo '<td>'.$r->tipo.'</td>';
            echo '<td>'.$r->modelo.'</td>';
            echo '<td>'.$r->marca.'</td>';
            echo '<td>'.$r->n_serie.'</td>';
            
            echo '<td>';

            echo '<a href="'.base_url().'index.php/conecte/visualizarOs/'.$r->aparatos_id.'" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>';
                  
            
            echo '</td>';

            echo '</tr>';
        }?>
        <tr>
            
        </tr>
    </tbody>
</table>
</div>
</div>
	
<?php echo $this->pagination->create_links();}?>