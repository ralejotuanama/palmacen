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
                <h5>Editar Guía</h5>
                <!--<div class="buttons">
                <a href="<?php echo base_url() ?>index.php/os/visualizarAlbaran/<?php echo $result->idOs; ?>" class="btn btn-mini btn-inverse"><i class="icon-eye-open"></i> Visualizar Guía</a>
                </div>-->
            </div>
            <div class="widget-content nopadding">


                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalles de la Guía</a></li>
                        <li id="tabProdutos"><a href="#tab2" data-toggle="tab">Productos</a></li>
                        <!--<li id="tabServicos"><a href="#tab3" data-toggle="tab">Uniformes</a></li>-->
                        <li id="tabAnexos"><a href="#tab4" data-toggle="tab">Adjuntar</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

                            <div class="span12" id="divCadastrarOs">
                                
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                                    <?php echo form_hidden('idOs',$result->idOs) ?>
                                    
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <h3>#Guía: <?php echo $result->idOs ?></h3>
                                        
                                        <div class="span6" style="margin-left: 0">
                                            <label for="cliente">Proveedor<span class="required">*</span></label>
                                            <input id="cliente" class="span12" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>"  />
                                            <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value="<?php echo $result->clientes_id ?>"  />
                                            <input id="valorTotal" type="hidden" name="valorTotal" value=""  />
                                        </div>
                                        <div class="span6">
                                            <label for="tecnico">Responsable<span class="required"></span></label>
                                            <input id="tecnico" class="span12" type="text" name="tecnico" value="<?php echo $result->nome ?>"  />
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?php echo $result->usuarios_id ?>"  />
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                       <!-- <div class="span3">
                                            <label for="status">Estado<span class="required">*</span></label>
                                            <select class="span12" name="status" id="status" value="">
                                                <option <?php if($result->status == 'Abierto'){echo 'selected';} ?> value="Abierto">Abierto</option>
                                                <option <?php if($result->status == 'Presupuesto'){echo 'selected';} ?> value="Presupuesto">Presupuestado</option>
                                                <option <?php if($result->status == 'En Curso'){echo 'selected';} ?> value="En Curso">En Curso</option>
                                                <option <?php if($result->status == 'Facturado'){echo 'selected';} ?> value="Facturado">Facturado</option>
                                                <option <?php if($result->status == 'Finalizado'){echo 'selected';} ?> value="Finalizado">Finalizado</option>
                                                <option <?php if($result->status == 'Cancelado'){echo 'selected';} ?> value="Cancelado">Cancelado</option>
                                            </select>
                                        </div>   -->                                         
                                        <div class="span3">
                                            <label for="dataInicial">Fecha Recepción<span class="required">*</span></label>
                                            <input id="dataInicial" class="span12 datepicker" type="text" name="dataInicial" value="<?php echo date('d/m/Y', strtotime($result->dataInicial)); ?>"   />
                                        </div>
                                        <div class="span3">
                                            <label for="dataFinal">Fecha2</label>
                                            <input id="dataFinal" class="span12 datepicker" type="text" name="dataFinal" value="<?php 

                                            $dataFinal = date(('d/m/Y'),strtotime($result->dataFinal));
                                            if($dataFinal ==  "01/01/1970"){
                                                echo '';
                                            }
                                            else{
                                                echo $dataFinal;
                                            } ?>"   />
                                        </div>

                                        <div class="span3">
                                            <label for="tipodocumento">Tipo Documento<span class="required">*</span></label>
                                            <select class="span12" name="tipodocumento" id="tipodocumento" value="">
                                            <option <?php if($result->tipodocumento == ''){echo 'selected';} ?> value="">Seleccione</option>
                                                <option <?php if($result->tipodocumento == 'guia'){echo 'selected';} ?> value="guia">Guía</option>
                                                <option <?php if($result->tipodocumento == 'boleta'){echo 'selected';} ?> value="boleta">Boleta</option>
                                                <option <?php if($result->tipodocumento == 'factura'){echo 'selected';} ?> value="factura">Factura</option>
                                                <option <?php if($result->tipodocumento == 'notacredito'){echo 'selected';} ?> value="notacredito">Nota de crédito</option>
                                              
                                            </select>
                                        </div> 

                                       
                                        
                                        <!--<div class="span3">
                                            <label for="garantia">Garantía</label>
                                            <input id="garantia" type="text" class="span12" name="garantia" value="<?php echo $result->garantia ?>"  />
                                        </div>-->
                                    </div>

                                    <!--<div class="span12" style="padding: 1%; margin-left: 0">
                                        <label> Descripción del Equipo (Editar si es necesario)</label>
                                    </div>-->

                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                    <!--
                                        
                                        <div class="span3">
                                            <label for="tipo">Tipo de Equipo</label>
                                            <input id="tipo" type="text" class="span12" name="tipo" value="<?php echo $result->tipo ?>"  />
                                        </div> 

                                        <div class="span3">
                                            <label for="marca">Marca</label>
                                            <input id="marca" type="text" class="span12" name="marca" value="<?php echo $result->marca ?>"  />
                                        </div>                                         
                                        
                                        <div class="span3">
                                            <label for="modelo">Modelo</label>
                                            <input id="modelo" type="text" class="span12" name="modelo" value="<?php echo $result->modelo ?>"  />
                                        </div>
                                        -->
                                        <div class="span3">
                                            <label for="serie">Numero de Documento</label>
                                            <input id="serie" type="text" class="span12" name="serie" value="<?php echo $result->serie ?>"  />
                                        </div>

                                        
                                    </div>

                                    

                                   <!-- <div class="span12" style="padding: 1%; margin-left: 0">

                                        <div class="span6">
                                            <label for="descricaoProduto">Descripción Produto/Servicio</label>
                                            <textarea class="span12" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5"><?php echo $result->descricaoProduto?></textarea>
                                        </div>
                                        <div class="span6">
                                            <label for="defeito">Defecto</label>
                                            <textarea class="span12" name="defeito" id="defeito" cols="30" rows="5"><?php echo $result->defeito?></textarea>
                                        </div>

                                    </div>-->


                                    <!--<div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6">
                                            <label for="observacoes">Observaciones</label>
                                            <textarea class="span12" name="observacoes" id="observacoes" cols="30" rows="5"><?php echo $result->observacoes ?></textarea>
                                        </div>
                                        <div class="span6">
                                            <label for="laudoTecnico">Diagnóstico Técnico</label>
                                            <textarea class="span12" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5"><?php echo $result->laudoTecnico ?></textarea>
                                        </div>
                                    </div>-->



                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <!--<?php if($result->faturado == 0){ ?>
                                                <a href="#modal-faturar" id="btn-faturar" role="button" data-toggle="modal" class="btn btn-success"><i class="icon-file"></i> Facturar</a>
                                            <?php } ?>-->
                                            <button class="btn btn-primary" id="btnContinuar"><i class="icon-white icon-ok"></i> Modificar</button>
                                            <a href="<?php echo base_url() ?>index.php/os/visualizar/<?php echo $result->idOs; ?>" class="btn btn-inverse"><i class="icon-eye-open"></i> Visualizar Guía</a>
                                            <a href="<?php echo base_url() ?>index.php/os" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="span12" id="divProdutos" style="margin-left: 0">
                                <table class="table table-bordered" id="tblProdutos">
                                    <thead>
                                        <tr>
                                            <th>Proveedor</th>
                                            <th>Responsable</th>
                                            <th>Fecha Recepción</th>
                                              <th>Tipo Dodumento</th>
                                            <th>Nro</th>
                                            <th>Accion</th>
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
                                            echo '<td style=text-align:center;><a href="" idAcao="'.$p->idProdutos_os.'" prodAcao="'.$p->idProdutos.'" quantAcao="'.$p->quantidade.'" title="Eliminar Producto" class="btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
                                            echo '<td style=text-align:center;>S/. '.number_format($p->subTotal,2,',','.').'</td>';
                                            echo '</tr>';
                                        }?>
                                       
                                        <!--<tr>
                                            <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>S/. <?php echo number_format($total,2,',','.');?><input type="hidden" id="total-venda" value="<?php echo number_format($total,2); ?>"></strong></td>
                                        </tr>-->
                                    </tbody>
                                </table>
                            </div>

                        </div>


                        <!--Produtos-->
                        <div class="tab-pane" id="tab2">
                            <div class="span12 well" style="padding: 1%; margin-left: 0">
                                <form id="formProdutos" action="<?php echo base_url() ?>index.php/os/adicionarProduto" method="post">
                                    <div class="span8">
                                        <input type="hidden" name="idProduto" id="idProduto" />
                                        <input type="hidden" name="idOsProduto" id="idOsProduto" value="<?php echo $result->idOs?>" />
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
                                        <label for="">.</label>
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
                                            <th>Herramienta</th>
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
                                            echo '<td style=text-align:center;><a href="" idAcao="'.$p->idProdutos_os.'" prodAcao="'.$p->idProdutos.'" quantAcao="'.$p->quantidade.'" title="Eliminar Producto" class="btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
                                            echo '<td style=text-align:center;>S/. '.number_format($p->subTotal,2,',','.').'</td>';
                                            echo '</tr>';
                                        }?>
                                       
                                        <tr>
                                            <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>S/. <?php echo number_format($total,2,',','.');?><input type="hidden" id="total-venda" value="<?php echo number_format($total,2); ?>"></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <!--Serviços-->
                        <div class="tab-pane" id="tab3">
                            <div class="span12" style="padding: 1%; margin-left: 0">
                                <div class="span12 well" style="padding: 1%; margin-left: 0">
                                    <form id="formServicos" action="<?php echo base_url() ?>index.php/os/adicionarServico" method="post">
                                    <div class="span10">
                                        <input type="hidden" name="idServico" id="idServico" />
                                        <input type="hidden" name="idOsServico" id="idOsServico" value="<?php echo $result->idOs?>" />
                                        <input type="hidden" name="precoServico" id="precoServico" value=""/>
                                        <label for="">Uniforme</label>
                                        <input type="text" class="span12" name="servico" id="servico" placeholder="Escriba el nombre del servicio" />
                                    </div>
                                    <div class="span2">
                                        <label for="">.</label>
                                        <button class="btn btn-success span12"><i class="icon-white icon-plus"></i> Agregar</button>
                                    </div>
                                    <div class="span6">
                                        <a href="#modalServicio" data-toggle="modal" role="button" class="btn btn-success tip-bottom" title="Registrar un Servicio Nuevo"><i class="icon-plus icon-white"></i> Nuevo Uniforme</a>  
                                        </div>
                                    </form>
                                </div>
                                <div class="span12" id="divServicos" style="margin-left: 0">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Uniforme</th>
                                                <th>Acción</th>
                                                <th>Sub-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $total = 0;
                                        foreach ($servicos as $s) {
                                            $preco = $s->preco;
                                            $total = $total + $preco;
                                            echo '<tr>';
                                            echo '<td>'.$s->nome.'</td>';
                                            echo '<td><span idAcao="'.$s->idServicos_os.'" title="Eliminar Servicio" class="btn btn-danger"><i class="icon-remove icon-white"></i></span></td>';
                                            echo '<td>S/. '.number_format($s->preco,2,',','.').'</td>';
                                            echo '</tr>';
                                        }?>

                                        <tr>
                                            <td colspan="2" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>S/. <?php echo number_format($total,2,',','.');?><input type="hidden" id="total-servico" value="<?php echo number_format($total,2); ?>"></strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>


                        <!--Anexos-->
                        <div class="tab-pane" id="tab4">
                            <div class="span12" style="padding: 1%; margin-left: 0">
                                <div class="span12 well" style="padding: 1%; margin-left: 0" id="form-anexos">
                                    <form id="formAnexos" enctype="multipart/form-data" action="javascript:;" accept-charset="utf-8"s method="post">
                                    <div class="span10">
                                
                                        <input type="hidden" name="idOsServico" id="idOsServico" value="<?php echo $result->idOs?>" />
                                        <label for="">Adjuntar Archivo</label>
                                        <input type="file" class="span12" name="userfile[]" multiple="multiple" size="20" />
                                    </div>
                                    <div class="span2">
                                        <label for="">.</label>
                                        <button class="btn btn-success span12"><i class="icon-white icon-plus"></i> Adjuntar</button>
                                    </div>
                                    </form>
                                </div>
                
                                <div class="span12" id="divAnexos" style="margin-left: 0">
                                    <?php 
                                    $cont = 1;
                                    $flag = 5;
                                    foreach ($anexos as $a) {

                                        if($a->thumb == null){
                                            $thumb = base_url().'assets/img/icon-file.png';
                                            $link = base_url().'assets/img/icon-file.png';
                                        }
                                        else{
                                            $thumb = base_url().'assets/anexos/thumbs/'.$a->thumb;
                                            $link = $a->url.$a->anexo;
                                        }

                                        if($cont == $flag){
                                           echo '<div style="margin-left: 0" class="span3"><a href="#modal-anexo" imagem="'.$a->idAnexos.'" link="'.$link.'" role="button" class="btn anexo" data-toggle="modal"><img src="'.$thumb.'" alt=""></a></div>'; 
                                           $flag += 4;
                                        }
                                        else{
                                           echo '<div class="span3"><a href="#modal-anexo" imagem="'.$a->idAnexos.'" link="'.$link.'" role="button" class="btn anexo" data-toggle="modal"><img src="'.$thumb.'" alt=""></a></div>'; 
                                        }
                                        $cont ++;
                                    } ?>
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



 
<!-- Modal visualizar anexo -->
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Visualizar Archivo Adjunto</h3>
  </div>
  <div class="modal-body">
    <div class="span12" id="div-visualizar-anexo" style="text-align: center">
        <div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
    <a href="" link="" class="btn btn-danger" id="excluir-anexo">Eliminar Archivo Adjunto</a>
  </div>
</div>





<!-- Modal Faturar-->
<div id="modal-faturar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formFaturar" action="<?php echo current_url() ?>" method="post">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3 id="myModalLabel">Facturar Venta</h3>
        </div>
    <div class="modal-body">
    
        <div class="span12 alert alert-info" style="margin-left: 0"> Obligatorio llenar los campos con asterisco.</div>
            <div class="span12" style="margin-left: 0"> 
             <label for="descricao">Descripción</label>
             <input class="span12" id="descricao" type="text" name="descricao" value="Factura de O.S - #<?php echo $result->idOs; ?> "  /> 
            </div> 
      
      
         <div class="span12" style="margin-left: 0"> 
            <div class="span12" style="margin-left: 0"> 
                <label for="cliente">Cliente*</label>
                <input class="span12" id="cliente" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
                <input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
                <input type="hidden" name="os_id" id="os_id" value="<?php echo $result->idOs; ?>">
            </div>  
        </div>

        <div class="span12" style="margin-left: 0"> 
            <div class="span4" style="margin-left: 0">  
                <label for="valor">Valor*</label>
                <input type="hidden" id="tipo" name="tipo" value="ingreso" /> 
                <input class="span12 money" id="valor" type="text" name="valor" value="<?php echo number_format($total,2); ?> "  />
            </div>
            <div class="span4" >
                <label for="vencimento">Fecha Vencimiento*</label>
                <input class="span12 datepicker" id="vencimento" type="text" name="vencimento"  />
            </div>  
        </div>

         <div class="span12" style="margin-left: 0"> 
            <div class="span4" style="margin-left: 0">
                <label for="recebido">Recibido?</label>
                &nbsp &nbsp &nbsp &nbsp <input  id="recebido" type="checkbox" name="recebido" value="1" /> 
            </div>
            <div id="divRecebimento" class="span8" style=" display: none">
                <div class="span6">
                    <label for="recebimento">Fecha Recibo</label>
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
  <form id="formProduto" action="<?php echo base_url() ?>index.php/produtos/adicionarOs" method="post">
     <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
     <h3 id="myModalLabel">Almacen  - Agregar Nueva Herramienta</h3>
     </div>
    <div class="modal-body">
        <div class="widget-content nopadding">
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formProduto" method="post" class="form-horizontal" >
                     <input id="idOs" type="hidden" name="idOs" value="<?php echo $result->idOs ?>" />
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
    

<!-- Modal Servicio-->

<div id="modalServicio" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formServico" action="<?php echo base_url() ?>index.php/servicos/adicionarOs" method="post">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Almacen  - Agregar Nuevo Uniforme</h3>
    </div>
  <div class="modal-body">
        <div class="widget-content nopadding">
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formServico" method="post" class="form-horizontal" >
                	<input id="idOs" type="hidden" name="idOs" value="<?php echo $result->idOs ?>" />
                    <div class="control-group">
                        <label for="nome" class="control-label">Nombre<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nome" type="text" name="nome" value="<?php echo set_value('nome'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="preco" class="control-label"><span class="required">Precio*</span></label>
                        <div class="controls">
                            <input id="preco" class="money" type="text" name="preco" value="<?php echo set_value('preco'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label">Descripción</label>
                        <div class="controls">
                            <input id="descricao" type="text" name="descricao" value="<?php echo set_value('descricao'); ?>"  />
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
         total_servico = $('#total-servico').val();
         valor = valor.replace(',', '' );
         total_servico = total_servico.replace(',', '' );
         total_servico = parseFloat(total_servico); 
         valor = parseFloat(valor);
         $('#valor').val(valor + total_servico);
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
              url: "<?php echo base_url();?>index.php/os/faturar",
              data: dados,
              dataType: 'json',
              success: function(data)
              {
                if(data.result == true){
                    
                    window.location.reload(true);
                }
                else{
                    alert('Ocurrió un error al intentar facturar la OS.');
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

      $("#servico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteServico",
            minLength: 2,
            select: function( event, ui ) {

                 $("#idServico").val(ui.item.id);
                 $("#precoServico").val(ui.item.preco);
                 

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




      $("#formOs").validate({
          rules:{
             cliente: {required:true},
             tecnico: {required:true},
             dataInicial: {required:true}
          },
          messages:{
             cliente: {required: 'Campo Requerido.'},
             tecnico: {required: 'Campo Requerido.'},
             dataInicial: {required: 'Campo Requerido.'}
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
             quantidade: {required: 'Ingresé una cantidad'}
          },
          submitHandler: function( form ){
             var quantidade = parseInt($("#quantidade").val());
             var estoque = parseInt($("#estoque").val());
             if(estoque < quantidade){
                alert('no posee stock suficiente.');
             }
             else{
                 var dados = $( form ).serialize();
                $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>index.php/os/adicionarProduto",
                  data: dados,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $( "#divProdutos" ).load("<?php echo current_url();?> #divProdutos" );
                        $("#quantidade").val('');
                        $("#produto").val('').focus();
                    }
                    else{
                        alert('Ocurrió un errorr al agregar un producto.');
                    }
                  }
                  });

                  return false;
                }

             }
             
       });

       $("#formServicos").validate({
          rules:{
             servico: {required:true}
          },
          messages:{
             servico: {required: 'Ingresé un servicio'}
          },
          submitHandler: function( form ){       
                 var dados = $( form ).serialize();
                 
                $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>index.php/os/adicionarServico",
                  data: dados,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $( "#divServicos" ).load("<?php echo current_url();?> #divServicos" );
                        $("#servico").val('').focus();
                    }
                    else{
                        alert('Ocurrió un error al intentar agregar un servicio.');
                    }
                  }
                  });

                  return false;
                }

       });


        $("#formAnexos").validate({
         
          submitHandler: function( form ){       
                //var dados = $( form ).serialize();
                var dados = new FormData(form); 
                $("#form-anexos").hide('1000');
                $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>index.php/os/anexar",
                  data: dados,
                  mimeType:"multipart/form-data",
                  contentType: false,
                  cache: false,
                  processData:false,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $("#divAnexos" ).load("<?php echo current_url();?> #divAnexos" );
                        $("#userfile").val('');

                    }
                    else{
                        $("#divAnexos").html('<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atención!</strong> '+data.mensagem+'</div>');      
                    }
                  },
                  error : function() {
                      $("#divAnexos").html('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atención!</strong> Ocurrió un error. Verifique los adjunto o(s) arquivo(s).</div>');      
                  }

                  });

                  $("#form-anexos").show('1000');
                  return false;
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
                  url: "<?php echo base_url();?>index.php/os/excluirProduto",
                  data: "idProduto="+idProduto+"&quantidade="+quantidade+"&produto="+produto,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $( "#divProdutos" ).load("<?php echo current_url();?> #divProdutos" );
                        
                    }
                    else{
                        alert('Ocurrió un erro al intentar eliminar el producto.');
                    }
                  }
                  });
                  return false;
            }
            
       });



       $(document).on('click', 'span', function(event) {
            var idServico = $(this).attr('idAcao');
            if((idServico % 1) == 0){
                $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>index.php/os/excluirServico",
                  data: "idServico="+idServico,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $("#divServicos").load("<?php echo current_url();?> #divServicos" );

                    }
                    else{
                        alert('Ocurrió un erro al intentar eliminar el servicio.');
                    }
                  }
                  });
                  return false;
            }

       });


       $(document).on('click', '.anexo', function(event) {
           event.preventDefault();
           var link = $(this).attr('link');
           var id = $(this).attr('imagem');
           var url = '<?php echo base_url(); ?>os/excluirAnexo/';
           $("#div-visualizar-anexo").html('<img src="'+link+'" alt="">');
           $("#excluir-anexo").attr('link', url+id);

           $("#download").attr('href', "<?php echo base_url(); ?>index.php/os/downloadanexo/"+id);

       });

       $(document).on('click', '#excluir-anexo', function(event) {
           event.preventDefault();

           var link = $(this).attr('link'); 
           $('#modal-anexo').modal('hide');
           $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");

           $.ajax({
                  type: "POST",
                  url: link,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $("#divAnexos" ).load("<?php echo current_url();?> #divAnexos" );
                    }
                    else{
                        alert(data.mensagem);
                    }
                  }
            });
       });


       $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

});

</script>




