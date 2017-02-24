<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aVenda')){ ?>
    <a href="<?php echo base_url();?>index.php/vendas/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Documento</a>
<?php } ?>

<?php

if(!$results){?>
	<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tags"></i>
         </span>
        <h5>Guia</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Fecha de Creación</th>
            <th>Cliente</th>
            <!--<th>Facturado</th>-->
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="6">Ninguna venta Registrada</td>
        </tr>
    </tbody>
</table>
</div>
</div>
<?php } else{?>


<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tags"></i>
         </span>
        <h5>Guía</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Fecha </th>
            <th>Técnico</th>
           <!-- <th>Facturado</th>-->
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            $dataVenda = date(('d/m/Y'),strtotime($r->dataVenda));
            if($r->faturado == 1){$faturado = 'Si';} else{ $faturado = 'No';}           
            echo '<tr>';
            echo '<td style=text-align:center;>'.$r->idVendas.'</td>';
            echo '<td style=text-align:center;>'.$dataVenda.'</td>';
            echo '<td style=text-align:center;><a href="'.base_url().'index.php/clientes/visualizar/'.$r->idUsuarios.'">'.$r->nome.'</a></td>';
           /* echo '<td style=text-align:center;>'.$faturado.'</td>';*/
            
            echo '<td style=text-align:center;>';
            
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vVenda')){
                echo '<a style="margin-right: 1%" href="'.base_url().'index.php/vendas/visualizar/'.$r->idVendas.'" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>'; 
            }

            if($this->permission->checkPermission($this->session->userdata('permissao'),'eVenda')){
                echo '<a style="margin-right: 1%" href="'.base_url().'index.php/vendas/editar/'.$r->idVendas.'" class="btn btn-info tip-top" title="Editar documento"><i class="icon-pencil icon-white"></i></a>'; 
            }

            if($this->permission->checkPermission($this->session->userdata('permissao'),'dVenda')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" venda="'.$r->idVendas.'" class="btn btn-danger tip-top" title="Eliminar documento"><i class="icon-remove icon-white"></i></a>'; 
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
  <form action="<?php echo base_url() ?>index.php/vendas/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Eliminar Venta</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idVenda" name="id" value="" />
    <h5 style="text-align: center">Desea realmente eliminar esta Venta?</h5>
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
        var venda = $(this).attr('venda');
        $('#idVenda').val(venda);
    });

});

</script>