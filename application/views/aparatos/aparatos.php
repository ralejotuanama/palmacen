<?php

if(!$results){?>
<a href="#" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Equipo</a>
<!--<a href="<?php echo site_url('conecte/apcrear');?>" class="btn btn-success"><i class="icon-plus icon-white"></i>Agregar Aparato</a>-->
    <div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tasks"></i>
         </span>
        <h5>Equipos  - Esta opcion se encuentra en construcción</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">            
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Nº de Serie</th>            
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="6">Ningún equipo registrado</td>
        </tr>
    </tbody>
</table>
</div>
</div>
<?php } else{?>

<a href="#" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Equipo</a>
<!--<a href="<?php echo site_url('conecte/apcrear');?>" class="btn btn-success"><i class="icon-plus icon-white"></i>Agregar Aparato</a>-->
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tasks"></i>
         </span>
        <h5>Equipos  - Esta opcion se encuentra en construcción</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>Cliente</th>
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
            echo '<td>'.$r->nomeCliente.'</td>';
            echo '<td>'.$r->tipo.'</td>';
            echo '<td>'.$r->modelo.'</td>';
            echo '<td>'.$r->marca.'</td>';
            echo '<td>'.$r->n_serie.'</td>';
            
            echo '<td>';

          //  echo '<a href="'.base_url().'conecte/visualizarOs/'.$r->aparatos_id.'" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>';
                  
           // echo '<a href="'.base_url().'conecte/visualizarOs/'.$r->aparatos_id.'/" class="btn btn-info tip-top" title="Editar"><i class="icon-pencil icon-white"></i></a>';
            
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