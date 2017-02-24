<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){ ?>
    <a href="<?php echo base_url();?>index.php/clientes/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Proveedor</a>    
<?php } ?>

<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>Proveedor</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>DNI/NIE/NIF</th>
                        <th>Teléfono</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Ningún Cliente Registrado</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php }else{
	

?>
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-user"></i>
         </span>
        <h5>Proveedor</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>RUC</th>
            <th>Teléfono</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td style=text-align:center;>'.$r->idClientes.'</td>';
            echo '<td style=text-align:center;>'.$r->nomeCliente.'</td>';
            echo '<td style=text-align:center;>'.$r->documento.'</td>';
            echo '<td style=text-align:center;>'.$r->telefone.'</td>';
            echo '<td style=text-align:center;>';
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
                echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$r->idClientes.'" style="margin-right: 1%" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
                echo '<a href="'.base_url().'index.php/clientes/editar/'.$r->idClientes.'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Proveedor"><i class="icon-pencil icon-white"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="'.$r->idClientes.'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Eliminar Proveedor"><i class="icon-remove icon-white"></i></a>'; 
            }

              
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



 
<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/clientes/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Eliminar Proveedor</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idCliente" name="id" value="" />
    <h5 style="text-align: center">¿Realmente deseas eliminar este cliente y los datos asociados con él (O.S, ventas, ingresos)?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Eliminar</button>
  </div>
  </form>
</div>






<script type="text/javascript">
$(document).ready(function(){


   $(document).on('click', 'a', function(event) {
        
        var cliente = $(this).attr('cliente');
        $('#idCliente').val(cliente);

    });

});

</script>
