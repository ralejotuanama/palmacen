<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>


<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                <h5>Editar Documento</h5>
            </div>
            <div class="widget-content nopadding">


                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalles del Documento</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

                            <div class="span12" id="divEditarVenda">
                                
                                <form action="<?php echo current_url(); ?>" method="post" id="formVendas">
                                    <?php echo form_hidden('idVendas',$result->idVendas) ?>
                                    
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <h3>#Documento: <?php echo $result->idVendas ?></h3>
                                        <div class="span2" style="margin-left: 0">
                                            <label for="dataFinal">Fecha </label>
                                            <input id="dataVenda" class="span12 datepicker" type="text" name="dataVenda" 
                                            value="<?php echo date('d/m/Y', strtotime($result->dataVenda)); ?>"  />
                                        </div>
                                        <div class="span5" style="display:none;" >
                                            <label for="cliente">Técnico<span class="required"></span></label>
                                            <input id="cliente" class="span12" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>"  />
                                            <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value="<?php echo $result->clientes_id ?>"  />
                                            <input id="valorTotal" type="hidden" name="valorTotal" value=""  />
                                        </div>
                                        <div class="span5" >
                                            <label for="tecnico">Técnico<span class="required">*</span></label>
                                            <input id="tecnico" class="span12" type="text" name="tecnico" value="<?php echo $result->nome ?>"  />
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?php echo $result->usuarios_id ?>"  />
                                        </div>
                                        
                                    </div>
                                    
                                    
                                   
                                   
                                    <div class="span12" style="padding: 1%; margin-left: 0">
            
                                        <div class="span8 offset2" style="text-align: center">
                                            <!--<?php if($result->faturado == 0){ ?>
                                            <a href="#modal-faturar" id="btn-faturar" role="button" data-toggle="modal" class="btn btn-success"><i class="icon-file"></i> Facturar</a>
                                            <?php } ?>-->
                                            <button class="btn btn-primary" id="btnContinuar"><i class="icon-white icon-ok"></i> Modificar</button>
                                            <a href="<?php echo base_url() ?>index.php/vendas/visualizar/<?php echo $result->idVendas; ?>" class="btn btn-inverse"><i class="icon-eye-open"></i> Visualizar Documento</a>
                                            <a href="<?php echo base_url() ?>index.php/vendas" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                                        </div>

                                    </div>

                                </form>
                                
                                <div class="span12 well" style="padding: 1%; margin-left: 0">
                                        
                                        <form id="formProdutos" action="<?php echo base_url(); ?>index.php/vendas/adicionarProduto" method="post">
                                            <div class="span8">
                                                <input type="hidden" name="idProduto" id="idProduto" />
                                                <input type="hidden" name="idVendasProduto" id="idVendasProduto" value="<?php echo $result->idVendas?>" />
                                                <input type="hidden" name="estoque" id="estoque" value=""/>
                                                <input type="hidden" name="preco" id="preco" value=""/>
                                                <label for="">Producto</label>
                                                <input type="text" class="span12" name="produto" id="produto" placeholder="Introduzca el nombre del producto" />
                                            </div>
                                            <div class="span2">
                                                <label for="">Cantidad</label>
                                                <input type="text" placeholder="Cantidad" id="quantidade" name="quantidade" class="span12" />
                                            </div>
                                            <div class="span2">
                                                <label for="">&nbsp</label>
                                                <button class="btn btn-success span12" id="btnAdicionarProduto"><i class="icon-white icon-plus"></i> Agregar</button>
                                            </div>
                                            <div class="span6">
                                               <a href="#modalProducto" data-toggle="modal" role="button" class="btn btn-success tip-bottom" title="Agregar un nuevo producto"><i class="icon-plus icon-white"></i> Nuevo Producto</a>  
                                            </div>
                                        </form>
                                    </div>
                                    <div class="span12" id="divProdutos" style="margin-left: 0">
                                        <table class="table table-bordered" id="tblProdutos">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Acción</th>
                                                    <th>Sub-total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                foreach ($produtos as $p) {
                                                    
                                                    $total = $total + $p->subTotal;
                                                    echo '<tr>';
                                                    echo '<td style=text-align:center;>'.$p->descricao.'</td>';
                                                    echo '<td style=text-align:center;>'.$p->quantidade.'</td>';
                                                    echo '<td style=text-align:center;><a href="" idAcao="'.$p->idItens.'" prodAcao="'.$p->idProdutos.'" quantAcao="'.$p->quantidade.'" title="Eliminar Producto" class="btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
                                                    echo '<td style=text-align:center;>S/. '.number_format($p->subTotal,2,',','.').'</td>';
                                                    echo '</tr>';
                                                }?>
                                               
                                                <tr>
                                                    <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                                                    <td><strong>S/. <?php echo number_format($total,2,',','.');?></strong> <input type="hidden" id="total-venda" value="<?php echo number_format($total,2); ?>"></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        


                                    </div>

                            </div>

                        </div>

                    </div>

                </div>


.

        </div>

    </div>
</div>
</div>


<!-- Modal Faturar-->
<div id="modal-faturar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form id="formFaturar" action="<?php echo current_url() ?>" method="post">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  <h3 id="myModalLabel">Faturar Venda</h3>
</div>
<div class="modal-body">
    
    <div class="span12 alert alert-info" style="margin-left: 0"> Obligatorio llenar los campos con asterisco.</div>
    <div class="span12" style="margin-left: 0"> 
      <label for="descricao">Descripción</label>
      <input class="span12" id="descricao" type="text" name="descricao" value="Facturar Venta - #<?php echo $result->idVendas; ?> "  />
      
    </div>  
    <div class="span12" style="margin-left: 0"> 
      <div class="span12" style="margin-left: 0"> 
        <label for="cliente">Cliente*</label>
        <input class="span12" id="cliente" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
        <input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
        <input type="hidden" name="vendas_id" id="vendas_id" value="<?php echo $result->idVendas; ?>">
      </div>
      
      
    </div>
    <div class="span12" style="margin-left: 0"> 
      <div class="span4" style="margin-left: 0">  
        <label for="valor">Valor*</label>
        <input type="hidden" id="tipo" name="tipo" value="ingreso" /> 
        <input class="span12 money" id="valor" type="text" name="valor" value="<?php echo number_format($total,2); ?> "  />
      </div>
      <div class="span4" >
        <label for="vencimento">Fecha de Vencimiento*</label>
        <input class="span12 datepicker" id="vencimento" type="text" name="vencimento"  />
      </div>
      
    </div>
    
    <div class="span12" style="margin-left: 0"> 
      <div class="span4" style="margin-left: 0">
        <label for="recebido">Recebido?</label>
        &nbsp &nbsp &nbsp &nbsp<input  id="recebido" type="checkbox" name="recebido" value="1" /> 
      </div>
      <div id="divRecebimento" class="span8" style=" display: none">
        <div class="span6">
          <label for="recebimento">Fecha de recibo</label>
          <input class="span12 datepicker" id="recebimento" type="text" name="recebimento" /> 
        </div>
        <div class="span6">
          <label for="formaPgto">Forma Pgto</label>
          <select name="formaPgto" id="formaPgto" class="span12">
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
            <option value="Cheque">Cheque</option>
            <option value="Boleto">Boletos</option>
            <option value="Depósito">Depósito</option>
            <option value="Débito">Débito</option>        
          </select>
        </div>
      </div>
      
    </div>
    
    
</div>
<div class="modal-footer">
  <button class="btn" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-faturar">Cancelar</button>
  <button class="btn btn-primary">Facturar</button>
</div>
</form>
</div>

<!-- Modal Producto-->

<div id="modalProducto" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formProduto" action="<?php echo base_url() ?>index.php/produtos/adicionarV" method="post">
     <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
     <h3 id="myModalLabel">MAP OS  - Agregar Nuevo Producto</h3>
     </div>
    <div class="modal-body">
        <div class="widget-content nopadding">
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formProduto" method="post" class="form-horizontal" >
                     <input id="idVendas" type="hidden" name="idVendas" value="<?php echo $result->idVendas ?>" />
                     <div class="control-group">
                        <label for="descricao" class="control-label">Descripción<span class="required">*</span></label>
                        <div class="controls">
                            <input id="descricao" type="text" name="descricao" value="<?php echo set_value('descricao'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="unidade" class="control-label">Unidad<span class="required">*</span></label>
                        <div class="controls">
                            <input id="unidade" type="text" name="unidade" value="<?php echo set_value('unidade'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="precoCompra" class="control-label">Precio de Compra<span class="required">*</span></label>
                        <div class="controls">
                            <input id="precoCompra" class="money" type="text" name="precoCompra" value="<?php echo set_value('precoCompra'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="precoVenda" class="control-label">Precio de Venta<span class="required">*</span></label>
                        <div class="controls">
                            <input id="precoVenda" class="money" type="text" name="precoVenda" value="<?php echo set_value('precoVenda'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="estoque" class="control-label">Stock<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estoque" type="text" name="estoque" value="<?php echo set_value('estoque'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="estoqueMinimo" class="control-label">Stock Mínimo</label>
                        <div class="controls">
                            <input id="estoqueMinimo" type="text" name="estoqueMinimo" value="<?php echo set_value('estoqueMinimo'); ?>"  />
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
    </form>
</div>
 

<script type="text/javascript" src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">
$(document).ready(function(){

     $(".money").maskMoney(); 

     $('#recebido').click(function(event) {
        var flag = $(this).is(':checked');
        if(flag == true){
          $('#divRecebimento').show();
        }
        else{
          $('#divRecebimento').hide();
        }
     });

     $(document).on('click', '#btn-faturar', function(event) {
       event.preventDefault();
         valor = $('#total-venda').val();
         valor = valor.replace(',', '' );
         $('#valor').val(valor);
     });
     
     $("#formFaturar").validate({
          rules:{
             descricao: {required:true},
             cliente: {required:true},
             valor: {required:true},
             vencimento: {required:true}
      
          },
          messages:{
             descricao: {required: 'Campo Requerido.'},
             cliente: {required: 'Campo Requerido.'},
             valor: {required: 'Campo Requerido.'},
             vencimento: {required: 'Campo Requerido.'}
          },
          submitHandler: function( form ){       
            var dados = $( form ).serialize();
            $('#btn-cancelar-faturar').trigger('click');
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>index.php/vendas/faturar",
              data: dados,
              dataType: 'json',
              success: function(data)
              {
                if(data.result == true){
                    
                    window.location.reload(true);
                }
                else{
                    alert('Ocurrió un errorr al faturar la venta.');
                    $('#progress-fatura').hide();
                }
              }
              });

              return false;
          }
     });

     $("#produto").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteProduto",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idProduto").val(ui.item.id);
                 $("#estoque").val(ui.item.estoque);
                 $("#preco").val(ui.item.preco);
                 $("#quantidade").focus();
                 

            }
      });



      $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function( event, ui ) {

                 $("#clientes_id").val(ui.item.id);


            }
      });

      $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 2,
            select: function( event, ui ) {

                 $("#usuarios_id").val(ui.item.id);


            }
      });



      $("#formVendas").validate({
          rules:{
             cliente: {required:true},
             tecnico: {required:true},
             dataVenda: {required:true}
          },
          messages:{
             cliente: {required: 'Campo Requerido.'},
             tecnico: {required: 'Campo Requerido.'},
             dataVenda: {required: 'Campo Requerido.'}
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




      $("#formProdutos").validate({
          rules:{
             quantidade: {required:true}
          },
          messages:{
             quantidade: {required: 'Introduzca la cantidad'}
          },
          submitHandler: function( form ){
             var quantidade = parseInt($("#quantidade").val());
             var estoque = parseInt($("#estoque").val());
             if(estoque < quantidade){
                alert('Usted no tiene bastante stock.');
             }
             else{
                 var dados = $( form ).serialize();
                $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>index.php/vendas/adicionarProduto",
                  data: dados,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $("#divProdutos" ).load("<?php echo current_url();?> #divProdutos" );
                        $("#quantidade").val('');
                        $("#produto").val('').focus();
                    }
                    else{
                        alert('Ocurrió un error al agregar un producto.');
                    }
                  }
                  });

                  return false;
                }

             }
             
       });

     

       $(document).on('click', 'a', function(event) {
            var idProduto = $(this).attr('idAcao');
            var quantidade = $(this).attr('quantAcao');
            var produto = $(this).attr('prodAcao');
            if((idProduto % 1) == 0){
                $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>index.php/vendas/excluirProduto",
                  data: "idProduto="+idProduto+"&quantidade="+quantidade+"&produto="+produto,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $( "#divProdutos" ).load("<?php echo current_url();?> #divProdutos" );
                        
                    }
                    else{
                        alert('Ocurrió un error al eliminar un producto.');
                    }
                  }
                  });
                  return false;
            }
            
       });

       $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });




});

</script>

