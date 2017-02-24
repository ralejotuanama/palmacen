<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>

<?php $situacao = $this->input->get('situacao');
	  $periodo = $this->input->get('periodo');	
 ?>

<style type="text/css">
	
	label.error{
		color: #b94a48;
	}

	input.error{
    border-color: #b94a48;
  }
  input.valid{
    border-color: #5bb75b;
  }


</style>


<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aLancamento')){ ?>
  <div class="span5" style="margin-left: 0">
      <a href="#modalingreso" data-toggle="modal" role="button" class="btn btn-success tip-bottom" title="Registrar Nuevo Ingreso"><i class="icon-plus icon-white"></i> Nuevo Ingreso</a>  
      <a href="#modalgasto" data-toggle="modal" role="button" class="btn btn-danger tip-bottom" title="Registrar Nuevo Gasto"><i class="icon-plus icon-white"></i> Nuevo Gasto</a>
  </div>
<?php } ?>
	
<div class="span7" style="margin-left: 0">
	<form action="<?php echo current_url(); ?>" method="get" >
		<div class="span4" style="margin-left: 0">
			<label>Período <i class="icon-info-sign tip-top" title="Movimientos con vencimiento en el período."></i></label>
			<select name="periodo" class="span12">
				<option value="dia">Día</option>
				<option value="semana" <?php if($periodo == 'semana'){ echo 'selected';} ?>>Semana</option>
				<option value="mes" <?php if($periodo == 'mes'){ echo 'selected';} ?>>Mes</option>
				<option value="ano" <?php if($periodo == 'ano'){ echo 'selected';} ?>>Año</option>
        <option value="todos" <?php if($periodo == 'todos'){ echo 'selected';} ?>>Todos</option>
			</select>
		</div>
		<div class="span4">
			<label>Situación <i class="icon-info-sign tip-top" title="Comunicados con situación espesifica o todos."></i></label>
			<select name="situacao" class="span12">
				<option value="todos">Todos</option>
				<option value="previsto" <?php if($situacao == 'previsto'){ echo 'selected';} ?>>Previsto</option>
				<option value="atrasado" <?php if($situacao == 'atrasado'){ echo 'selected';} ?>>Atrasado</option>
				<option value="realizado" <?php if($situacao == 'realizado'){ echo 'selected';} ?>>Realizado</option>
        <option value="pendente" <?php if($situacao == 'pendente'){ echo 'selected';} ?>>Pendiente</option>
			</select>
		</div>
		<div class="span4" >
			&nbsp
			<button type="submit" class="span12 btn btn-primary">Filtrar</button>
		</div>
		
	</form>
</div>

<div class="span12" style="margin-left: 0;">

<?php

if(!$results){?>
	<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tags"></i>
         </span>
        <h5>Movimientos financieros</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Tipo</th>
            <th>Cliente / Proveedor / Empresa</th>
            <th>Vencimiento</th>
            <th>Status</th>
            <th>Valor</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="6">Ningún Movimiento financiero Encontrado</td>
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
        <h5>Movimientos financieros</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered " id="divLancamentos">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Tipo</th>
            <th>Cliente / Proveedor / Empresa</th>
            <th>Vencimiento</th>
            <th>Status</th>
            <th>Valor</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $totalingreso = 0;
        $totalgasto = 0;
        $saldo = 0;
        foreach ($results as $r) {
            $vencimento = date(('d/m/Y'),strtotime($r->data_vencimento));
            if($r->baixado == 0){$status = 'Pendiente';}else{ $status = 'Pagó';};
            if($r->tipo == 'ingreso'){ $label = 'success'; $totalingreso += $r->valor;} else{$label = 'important'; $totalgasto += $r->valor;}
            echo '<tr>'; 
            echo '<td>'.$r->idLancamentos.'</td>';
            echo '<td><span class="label label-'.$label.'">'.ucfirst($r->tipo).'</span></td>';
            echo '<td>'.$r->cliente_fornecedor.'</td>';
            echo '<td>'.$vencimento.'</td>';   
            echo '<td>'.$status.'</td>';
            echo '<td> € '.number_format($r->valor,2,',','.').'</td>';
            
            echo '<td>';
            
            /*if($this->permission->checkPermission($this->session->userdata('permissao'),'vLancamento')){
                echo '<a style="margin-right: 1%" href="'.base_url().'financeiro/visualizar/'.$r->idLancamentos.'" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>';
            }*/
            
            if($this->permission->checkPermission($this->session->userdata('permissao'),'eLancamento')){
                echo '<a href="#modalEditar" style="margin-right: 1%" data-toggle="modal" role="button" idLancamento="'.$r->idLancamentos.'" descricao="'.$r->descricao.'" valor="'.$r->valor.'" vencimento="'.date('d/m/Y',strtotime($r->data_vencimento)).'" pagamento="'.date('d/m/Y', strtotime($r->data_pagamento)).'" baixado="'.$r->baixado.'" cliente="'.$r->cliente_fornecedor.'" formaPgto="'.$r->forma_pgto.'" tipo="'.$r->tipo.'" class="btn btn-info tip-top editar" title="Editar Movimiento"><i class="icon-pencil icon-white"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'dLancamento')){
                echo '<a href="#modalExcluir" data-toggle="modal" role="button" idLancamento="'.$r->idLancamentos.'" class="btn btn-danger tip-top excluir" title="Eliminar Movimiento"><i class="icon-remove icon-white"></i></a>'; 
            }
                     
            echo '</td>';
            echo '</tr>';
        }?>
        <tr>
            
        </tr>
    </tbody>
    <tfoot>
    	<tr>
    		<td colspan="5" style="text-align: right; color: green"> <strong>Total Ingresos:</strong></td>
    		<td colspan="2" style="text-align: left; color: green"><strong>€ <?php echo number_format($totalingreso,2,',','.') ?></strong></td>
    	</tr>
    	<tr>
    		<td colspan="5" style="text-align: right; color: red"> <strong>Total Gastos:</strong></td>
    		<td colspan="2" style="text-align: left; color: red"><strong>€ <?php echo number_format($totalgasto,2,',','.') ?></strong></td>
    	</tr>
    	<tr>
    		<td colspan="5" style="text-align: right"> <strong>Saldo:</strong></td>
    		<td colspan="2" style="text-align: left;"><strong>€ <?php echo number_format($totalingreso - $totalgasto,2,',','.') ?></strong></td>
    	</tr>
    </tfoot>
</table>
</div>
</div>

</div>
	
<?php echo $this->pagination->create_links();}?>



<!-- Modal nova ingreso -->
<div id="modalingreso" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formingreso" action="<?php echo base_url() ?>index.php/financeiro/adicionaringreso" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">MAP OS  - Agregar Ingreso</h3>
  </div>
  <div class="modal-body">
  		
  		<div class="span12 alert alert-info" style="margin-left: 0"> Obligatorio llenar los campos con asterisco.</div>
    	<div class="span12" style="margin-left: 0"> 
    		<label for="descricao">Descripción</label>
    		<input class="span12" id="descricao" type="text" name="descricao"  />
    		<input id="urlAtual" type="hidden" name="urlAtual" value="<?php echo current_url() ?>"  />
    	</div>	
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span12" style="margin-left: 0"> 
    			<label for="cliente">Cliente / Proveedor / Empresa*</label>
    			<input class="span12" id="cliente" type="text" name="cliente"  />
          <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value=""  />
    		</div>
    		
    		
    	</div>
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span4" style="margin-left: 0">  
    			<label for="valor">Valor*</label>
    			<input type="hidden" id="tipo" name="tipo" value="ingreso" />	
    			<input class="span12 money" id="valor" type="text" name="valor"  />
    		</div>
	    	<div class="span4" >
	    		<label for="vencimento">Fecha Vencimiento*</label>
	    		<input class="span12 datepicker" id="vencimento" type="text" name="vencimento"  />
	    	</div>
	    	
    	</div>
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span4" style="margin-left: 0">
    			<label for="recebido">Recibido?</label>
	    		&nbsp &nbsp &nbsp &nbsp<input  id="recebido" type="checkbox" name="recebido" value="1" />	
    		</div>
    		<div id="divRecebimento" class="span8" style=" display: none">
	    		<div class="span6">
	    			<label for="recebimento">Fecha Recibo</label>
		    		<input class="span12 datepicker" id="recebimento" type="text" name="recebimento" />	
	    		</div>
	    		<div class="span6">
		    		<label for="formaPgto">Forma de Pago</label>
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
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-success">Agregar Ingreso</button>
  </div>
  </form>
</div>




<!-- Modal nova gasto -->
<div id="modalgasto" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formgasto" action="<?php echo base_url() ?>index.php/financeiro/adicionargasto" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">MAP OS  - Agregar Gasto</h3>
  </div>
  <div class="modal-body">
  		<div class="span12 alert alert-info" style="margin-left: 0"> Obligatorio llenar los campos con asterisco.</div>
    	<div class="span12" style="margin-left: 0"> 
    		<label for="descricao">Descripción</label>
    		<input class="span12" id="descricao" type="text" name="descricao"  />
    		<input id="urlAtual" type="hidden" name="urlAtual" value="<?php echo current_url() ?>"  />
    	</div>	
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span12" style="margin-left: 0"> 
    			<label for="fornecedor">Cliente / Proveedor / Empresa*</label>
    			<input class="span12" id="fornecedor" type="text" name="fornecedor"  />
          <input id="cliente_id" class="span12" type="hidden" name="cliente_id" value=""  />
    		</div>
    		
    		
    	</div>
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span4" style="margin-left: 0">  
    			<label for="valor">Valor*</label>
    			<input type="hidden"  name="tipo" value="gasto" />	
    			<input class="span12 money"  type="text" name="valor"  />
    		</div>
	    	<div class="span4" >
	    		<label for="vencimento">Fecha Vencimiento*</label>
	    		<input class="span12 datepicker"  type="text" name="vencimento"  />
	    	</div>
	    	
    	</div>
    	<div class="span12" style="margin-left: 0"> 
    		<div class="span4" style="margin-left: 0">
    			<label for="pago">Fue Pagado?</label>
	    		&nbsp &nbsp &nbsp &nbsp<input  id="pago" type="checkbox" name="pago" value="1" />	
    		</div>
    		<div id="divPagamento" class="span8" style=" display: none">
	    		<div class="span6">
	    			<label for="pagamento">Fecha de Pago</label>
		    		<input class="span12 datepicker" id="pagamento" type="text" name="pagamento" />	
	    		</div>

	    		<div class="span6">
		    		<label for="formaPgto">Forma de Pago</label>
		    		<select name="formaPgto"  class="span12">
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
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Agregar Gasto</button>
  </div>
  </form>
</div>



<!-- Modal editar lançamento -->
<div id="modalEditar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formEditar" action="<?php echo base_url() ?>index.php/financeiro/editar" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">MAP OS  - Editar Movimiento Financiero</h3>
  </div>
  <div class="modal-body">
      <div class="span12 alert alert-info" style="margin-left: 0"> Obligatorio llenar los campos con asterisco.</div>
      <div class="span12" style="margin-left: 0"> 
        <label for="descricao">Descrición</label>
        <input class="span12" id="descricaoEditar" type="text" name="descricao"  />
        <input id="urlAtualEditar" type="hidden" name="urlAtual" value=""  />
      </div>  
      <div class="span12" style="margin-left: 0"> 
        <div class="span12" style="margin-left: 0"> 
          <label for="fornecedor">Cliente / Proveedor / Empresa*</label>
          <input class="span12" id="fornecedorEditar" type="text" name="fornecedor"  />
        </div>
        
        
      </div>
      <div class="span12" style="margin-left: 0"> 
        <div class="span4" style="margin-left: 0">  
          <label for="valor">Valor*</label>
          <input type="hidden"  name="tipo" value="gasto" />  
          <input type="hidden"  id="idEditar" name="id" value="" /> 
          <input class="span12 money"  type="text" name="valor" id="valorEditar" />
        </div>
        <div class="span4" >
          <label for="vencimento">Fecha Vencimiento*</label>
          <input class="span12 datepicker"  type="text" name="vencimento" id="vencimentoEditar"  />
        </div>
        <div class="span4">
          <label for="vencimento">Tipo*</label>
          <select class="span12" name="tipo" id="tipoEditar">
            <option value="ingreso">Ingreso</option>
            <option value="gasto">Gasto</option>
          </select>
        </div>
        
      </div>
      <div class="span12" style="margin-left: 0"> 
        <div class="span4" style="margin-left: 0">
          <label for="pago">Se pagó?</label>
          &nbsp &nbsp &nbsp &nbsp<input  id="pagoEditar" type="checkbox" name="pago" value="1" /> 
        </div>
        <div id="divPagamentoEditar" class="span8" style=" display: none">
          <div class="span6">
            <label for="pagamento">Fecha de Pago</label>
            <input class="span12 datepicker" id="pagamentoEditar" type="text" name="pagamento" />  
          </div>

          <div class="span6">
            <label for="formaPgto">Forma de Pago</label>
            <select name="formaPgto" id="formaPgtoEditar"  class="span12">
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
    <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCancelarEditar">Cancelar</button>
    <button class="btn btn-primary">Salvar Modificaciones</button>
  </div>
  </form>
</div>






<!-- Modal Excluir lançamento-->
<div id="modalExcluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">MAP OS  - Eliminar Movimiento Financiero</h3>
  </div>
  <div class="modal-body">
    <h5 style="text-align: center">Desea Realmente Eliminar el Movimiento Financiero?</h5>
    <input name="id" id="idExcluir" type="hidden" value="" />
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
    <button class="btn btn-danger" id="btnExcluir">Eliminar Movimiento Financieros</button>
  </div>
</div>





<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {

    $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/financeiro/autoCompleteCliente",
            minLength: 1,
            select: function( event, ui ) {

                 $("#clientes_id").val(ui.item.id);
                

            }
      });

    $("#fornecedor").autocomplete({
            source: "<?php echo base_url(); ?>index.php/financeiro/autoCompleteCliente",
            minLength: 1,
            select: function( event, ui ) {

                 $("#cliente_id").val(ui.item.id);
                

            }
      });
		
    $(".money").maskMoney();

		$('#pago').click(function(event) {
			var flag = $(this).is(':checked');
			if(flag == true){
				$('#divPagamento').show();
			}
			else{
				$('#divPagamento').hide();
			}
		});


		$('#recebido').click(function(event) {
			var flag = $(this).is(':checked');
			if(flag == true){
				$('#divRecebimento').show();
			}
			else{
				$('#divRecebimento').hide();
			}
		});

    $('#pagoEditar').click(function(event) {
      var flag = $(this).is(':checked');
      if(flag == true){
        $('#divPagamentoEditar').show();
      }
      else{
        $('#divPagamentoEditar').hide();
      }
    });


		$("#formingreso").validate({
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
          }
    });



		$("#formgasto").validate({
          rules:{
             descricao: {required:true},
             fornecedor: {required:true},
             valor: {required:true},
             vencimento: {required:true}
      
          },
          messages:{
             descricao: {required: 'Campo Requerido.'},
             fornecedor: {required: 'Campo Requerido.'},
             valor: {required: 'Campo Requerido.'},
             vencimento: {required: 'Campo Requerido.'}
          }
       	});
    

    $(document).on('click', '.excluir', function(event) {
      $("#idExcluir").val($(this).attr('idLancamento'));
    });


    $(document).on('click', '.editar', function(event) {
      $("#idEditar").val($(this).attr('idLancamento'));
      $("#descricaoEditar").val($(this).attr('descricao'));
      $("#fornecedorEditar").val($(this).attr('cliente'));
      $("#valorEditar").val($(this).attr('valor'));
      $("#vencimentoEditar").val($(this).attr('vencimento'));
      $("#pagamentoEditar").val($(this).attr('pagamento'));
      $("#formaPgtoEditar").val($(this).attr('formaPgto'));
      $("#tipoEditar").val($(this).attr('tipo'));
      $("#urlAtualEditar").val($(location).attr('href'));
      var baixado = $(this).attr('baixado');
      if(baixado == 1){
        $("#pagoEditar").attr('checked', true);
        $("#divPagamentoEditar").show();
      }
      else{
        $("#pagoEditar").attr('checked', false); 
        $("#divPagamentoEditar").hide();
      }
      

    });

    $(document).on('click', '#btnExcluir', function(event) {
        var id = $("#idExcluir").val();
    
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>index.php/financeiro/excluirLancamento",
          data: "id="+id,
          dataType: 'json',
          success: function(data)
          {
            if(data.result == true){
                $("#btnCancelExcluir").trigger('click');
                $("#divLancamentos").html('<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>');
                $("#divLancamentos").load( $(location).attr('href')+" #divLancamentos" );
                
            }
            else{
                $("#btnCancelExcluir").trigger('click');
                alert('Ocurrió un errorr al intentar eliminar el producto.');
            }
          }
        });
        return false;
    });
 
    $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

	});

</script>


