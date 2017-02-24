<a href="<?php echo base_url()?>index.php/usuarios/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Usuario</a>
<?php
if(!$results){?>
        <div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-user"></i>
        </span>
        <h5>Usuarios</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>NIF</th>
            <th>Teléfono</th>
            <th>Situación</th>
            <th>Nivel</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>    
        <tr>
            <td colspan="5">Ningún Usuario Encontrado</td>
        </tr>
    </tbody>
</table>
</div>
</div>


<?php } else{?>

<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-user"></i>
         </span>
        <h5>Usuarios</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Nombre</th>
            <th>DNI</th>
            <!--<th>NIF</th>-->
           <!-- <th>Teléfono</th>-->
            <!--<th>Situación</th>-->
            <th>Nivel</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
           
            echo '<tr>';
            echo '<td style=text-align:center;>'.$r->idUsuarios.'</td>';
            echo '<td style=text-align:center;>'.$r->nome.'</td>';
            echo '<td style=text-align:center;>'.$r->rg.'</td>';
           // echo '<td style=text-align:center;>'.$r->cpf.'</td>';
           // echo '<td style=text-align:center;>'.$r->telefone.'</td>';
           // echo '<td style=text-align:center;>'.$r->situacao.'</td>';
            echo '<td style=text-align:center;>'.$r->permissao.'</td>';
            echo '<td>
                      <a href="'.base_url().'index.php/usuarios/editar/'.$r->idUsuarios.'" class="btn btn-info tip-top" title="Editar Usuario"><i class="icon-pencil icon-white"></i></a>
                  </td>';
            echo '</tr>';
        }?>
        <tr>
            
        </tr>
    </tbody>
</table>
</div>
</div>
<!--<h5>NOTA: No eliminar ni modificar el usuario 1 (POR ASIGNAR) </h5>
<h5>Situación 1 = Activo </h5>
<h5>Situación 0 = Inactivo </h5>-->

	
<?php echo $this->pagination->create_links();}?>
