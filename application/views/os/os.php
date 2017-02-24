<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aOs')){ ?>
    <a href="<?php echo base_url();?>index.php/os/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar Guía</a>
<?php } ?>

<?php

if(!$results){?>
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
            <th>Nro documento</th>
          
            <th>Proveedor</th>
            <th>Fecha Creación</th>
           <!-- <th>Fecha Final</th>-->
            <!--<th>Status</th>-->
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="6">Ninguna O.S Registrada</td>
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
            <th>Nro documento</th>
            <th>Tipo documento</th>  
            <th>Proveedor</th>
            <th>Fecha Recepción</th>
           <!-- <th>Fecha Final</th>
            <th>Estado</th>-->
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            $dataInicial = date(('d/m/Y'),strtotime($r->dataInicial));
            $dataFinal = $r->dataFinal;
            echo '<tr>';
            echo '<td style=text-align:center;>'.$r->idOs.'</td>';
               echo '<td style=text-align:center;>'.$r->serie.'</td>';
               echo '<td style=text-align:center;>'.$r->tipodocumento.'</td>';
              
            echo '<td style=text-align:center;>'.$r->nomeCliente.'</td>';
            echo '<td style=text-align:center;>'.$dataInicial.'</td>';
            /*if($dataFinal ==  "01/01/1970"){
                echo '<td style=text-align:center;>'.' La orden sigue abierta '.'</td>';
            }
            else{
                echo '<td style=text-align:center;>'.$dataFinal.'</td>';
            }*/
           /* echo '<td style=text-align:center;>'.$r->status.'</td>';*/
            
            
            echo '<td style=text-align:center;>';
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vOs')){
                echo '<a style="margin-right: 1%" href="'.base_url().'index.php/os/visualizar/'.$r->idOs.'" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'eOs')){
                echo '<a style="margin-right: 1%" href="'.base_url().'index.php/os/editar/'.$r->idOs.'" class="btn btn-info tip-top" title="Editar Guía"><i class="icon-pencil icon-white"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'dOs')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" os="'.$r->idOs.'" class="btn btn-danger tip-top" title="Eliminar Guía"><i class="icon-remove icon-white"></i></a>  '; 
            }
            
                      
                      
            echo  '</td>';
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
  <form action="<?php echo base_url() ?>index.php/os/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Eliminar Guía</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idOs" name="id" value="" />
    <h5 style="text-align: center">Desea Realmente Eliminar esta Guía?</h5>
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
        
        var os = $(this).attr('os');
        $('#idOs').val(os);

    });

});

</script>