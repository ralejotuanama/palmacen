<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aServico')){ ?>
    <a href="<?php echo base_url()?>index.php/servicos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Uniforme</a>
<?php } ?>

<?php

if(!$results){?>

    <div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-wrench"></i>
         </span>
        <h5>Servicios</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="5">Ningún Servicio Registrsado</td>
        </tr>
    </tbody>
</table>
</div>
</div>



<?php }
else{ ?>

<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-wrench"></i>
         </span>
        <h5>Uniformes</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td style=text-align:center;>'.$r->idServicos.'</td>';
            echo '<td style=text-align:center;>'.$r->nome.'</td>';
            echo '<td style=text-align:center;>'.number_format($r->preco,2,',','.').'</td>';
            echo '<td style=text-align:center;>'.$r->descricao.'</td>';
            echo '<td style=text-align:center;>';
            if($this->permission->checkPermission($this->session->userdata('permissao'),'eServico')){
                echo '<a style="margin-right: 1%" href="'.base_url().'index.php/servicos/editar/'.$r->idServicos.'" class="btn btn-info tip-top" title="Editar Uniforme"><i class="icon-pencil icon-white"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'dServico')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" servico="'.$r->idServicos.'" class="btn btn-danger tip-top" title="Eliminar Uniforme"><i class="icon-remove icon-white"></i></a>  '; 
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
  <form action="<?php echo base_url() ?>index.php/servicos/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Eliminar Servicio</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idServico" name="id" value="" />
    <h5 style="text-align: center">Desea realmente eliminar este servicio?</h5>
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
        
        var servico = $(this).attr('servico');
        $('#idServico').val(servico);

    });

});

</script>