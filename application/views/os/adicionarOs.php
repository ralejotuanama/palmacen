<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.validate.js"></script>
<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                <h5>Registrar Guía</h5>
            </div>
            <div class="widget-content nopadding">
                

                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalles de la Guía</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

                            <div class="span12" id="divCadastrarOs">
                                <?php if($custom_error == true){ ?>
                                <div class="span12 alert alert-danger" id="divInfo" style="padding: 1%;">Datos incompletos, comprobar los campos con un asterisco o cliente correctamente seleccionado y responsable.</div>
                                <?php } ?>
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">

                                    <div class="span12" style="padding: 1%">
                                        <div class="span6">
                                            <label for="cliente">Proveedor<span class="required">*</span></label>
                                            <input id="cliente" class="span12" type="text" name="cliente" value=""  />
                                            <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value=""  />
                                        <!-- <div class="span4">
                                        <a href="#modalClienteV" data-toggle="modal" role="button" class="btn btn-success tip-bottom" title="Listar Clientes"><i class="icon-eye-open icon-white"></i> Listar Clientes</a>  
                                        </div> --> 
                                        <div class="span4">
                                        <a href="#modalCliente" data-toggle="modal" role="button" class="btn btn-success tip-bottom" title="Registrar Nuevo Cliente"><i class="icon-plus icon-white"></i> Nuevo Proveedor</a>  
                                        </div>
                                        
                                        </div>
                                        <div class="span6">
                                            <label for="tecnico">Responsable<span class="required"></span></label>
                                            <input id="tecnico" class="span12" type="text" name="tecnico" value=""  />
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value=""  />
                                        </div>

                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <!--<div class="span3">
                                            <label for="status">Estado<span class="required">*</span></label>
                                           <select class="span12" name="status" id="status" value="">
                                                <option value="Abierto">Abierto</option>
                                                <option value="Presupuesto">Presupuestado</option>
                                                <option value="En Curso">En Curso</option>
                                                <option value="Finalizado">Finalizado</option>
                                                <option value="Cancelado">Cancelado</option>
                                            </select>
                                        </div>-->
                                        <div class="span3">
                                            <label for="dataInicial">Fecha Recepción<span class="required">*</span></label>
                                            <input id="dataInicial" class="span12 datepicker" type="text" name="dataInicial" value=""  />
                                        </div>
                                       <!-- <div class="span3">
                                            <label for="dataFinal">Fecha2</label>
                                            <input id="dataFinal" class="span12 datepicker" type="text" name="dataFinal" value=""  />
                                        </div>-->

                                        <!--<div class="span3">
                                            <label for="tipodocumento">TipoDocumento<span class="required"></span></label>
                                           <select class="span12" name="tipodocumento" id="tipodocumento" value="">
                                                <option value="">Seleccione</option>
                                                <option value="guia">Guía</option>
                                                <option value="boleta">Boleta</option>
                                                <option value="factura">Factura</option>
                                                <option value="notacredito">Nota de crédito</option>
                                               
                                            </select>
                                        </div>-->

                                        <!--<div class="span3">
                                            <label for="garantia">Garantía</label>
                                            <input id="garantia" type="text" class="span12" name="garantia" value=""  />
                                        </div>-->
                                    </div>
                                    <!--<div class="span12" style="padding: 1%; margin-left: 0">
                                        <label> Descripción del Equipo (Completar si es necesario)</label>
                                    </div>-->

                                   <!-- <div class="span12" style="padding: 1%; margin-left: 0">
                                        
                                        <div class="span3">
                                            <label for="tipo">Tipo de Equipo</label>
                                            <input id="tipo" type="text" class="span12" name="tipo" value=""  />
                                        </div>

                                        <div class="span3">
                                            <label for="marca">Marca</label>
                                            <input id="marca" type="text" class="span12" name="marca" value=""  />
                                        </div>

                                        <div class="span3">
                                            <label for="modelo">Modelo</label>
                                            <input id="modelo" type="text" class="span12" name="modelo" value=""  />
                                        </div>
                                        
                                        <div class="span3">
                                            <label for="serie">Numero de Documento*</label>
                                            <input id="serie" type="text" class="span12" name="serie" value=""  />
                                        </div>

                                        
                                    </div>-->




                                    <!--<div class="span12" style="padding: 1%; margin-left: 0">

                                        <div class="span6">
                                            <label for="descricaoProduto">Descripción Produto/Servicio</label>
                                            <textarea class="span12" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5"></textarea>
                                                                                  
                                        </div>
                                        <div class="span6">
                                            <label for="defeito">Defecto</label>
                                            <textarea class="span12" name="defeito" id="defeito" cols="30" rows="5"></textarea>
                                        </div>

                                    </div>-->




                                   <!-- <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6">
                                            <label for="observacoes">Observaciones</label>
                                            <textarea class="span12" name="observacoes" id="observacoes" cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="span6">
                                            <label for="laudoTecnico">Diagnóstico Técnico</label>
                                            <textarea class="span12" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>-->




                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <button class="btn btn-success" id="btnContinuar"><i class="icon-share-alt icon-white"></i> Continuar</button>
                                            <a href="<?php echo base_url() ?>index.php/os" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>

                
.
             
        </div>
        
    </div>
</div>
</div>


<!-- Modal Cliente-->

<div id="modalCliente" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formClientes" action="<?php echo base_url() ?>index.php/clientes/adicionarOs" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">MAP OS  - Agregar Cliente</h3>
  </div>
  <div class="modal-body">
    <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                     <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <label for="nomeCliente" class="control-label">Nombre<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nomeCliente" type="text" name="nomeCliente" value="<?php echo set_value('nomeCliente'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="documento" class="control-label">DNI/NIE/NIF<span class="required">*</span></label>
                        <div class="controls">
                            <input id="documento" type="text" name="documento" value="<?php echo set_value('documento'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="telefone" class="control-label">Teléfono<span class="required">*</span></label>
                        <div class="controls">
                            <input id="telefone" type="text" name="telefone" value="<?php echo set_value('telefone'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="celular" class="control-label">Tel. Móvil</label>
                        <div class="controls">
                            <input id="celular" type="text" name="celular" value="<?php echo set_value('celular'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="rua" class="control-label">Dirección<span class="required">*</span></label>
                        <div class="controls">
                            <input id="rua" type="text" name="rua" value="<?php echo set_value('rua'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="numero" class="control-label">Número<span class="required">*</span></label>
                        <div class="controls">
                            <input id="numero" type="text" name="numero" value="<?php echo set_value('numero'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="bairro" class="control-label">Barrio<span class="required">*</span></label>
                        <div class="controls">
                            <input id="bairro" type="text" name="bairro" value="<?php echo set_value('bairro'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="cidade" class="control-label">Ciudad<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cidade" type="text" name="cidade" value="<?php echo set_value('cidade'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="estado" class="control-label">País<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estado" type="text" name="estado" value="<?php echo set_value('estado'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="cep" class="control-label">CP<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cep" type="text" name="cep" value="<?php echo set_value('cep'); ?>"  />
                        </div>
                    </div>



                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar</button>
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal listar Clientes-->

<div id="modalClienteV" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formClientes" action="<?php echo base_url() ?>index.php/clientes/" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">MAP OS  - Listar Cliente</h3>
  </div>
  

<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>Clientes</h5>

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
        <h5>Clientes</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
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
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td>'.$r->idClientes.'</td>';
            echo '<td>'.$r->nomeCliente.'</td>';
            echo '<td>'.$r->documento.'</td>';
            echo '<td>'.$r->telefone.'</td>';
            echo '<td>';
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
                echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$r->idClientes.'" style="margin-right: 1%" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
                echo '<a href="'.base_url().'index.php/clientes/editar/'.$r->idClientes.'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Cliente"><i class="icon-pencil icon-white"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="'.$r->idClientes.'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Eliminar Cliente"><i class="icon-remove icon-white"></i></a>'; 
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
    <h5 id="myModalLabel">Eliminar Cliente</h5>
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


<script type="text/javascript">
$(document).ready(function(){

      $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 1,
            select: function( event, ui ) {

                 $("#clientes_id").val(ui.item.id);
                

            }
      });

      $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 1,
            select: function( event, ui ) {

                 $("#usuarios_id").val(ui.item.id);


            }
      });

      
      

      $("#formOs").validate({
          rules:{
             cliente: {required:true},
             tecnico: {required:true},
             dataInicial: {required:true},
             tipodocumento: {required:true}
          },
          messages:{
             cliente: {required: 'Campo Requerido.'},
             tecnico: {required: 'Campo Requerido.'},
             dataInicial: {required: 'Campo Requerido.'},
              tipodocumento: {required: 'Campo Requerido.'}
          },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
       });

    $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
   
});

</script>

