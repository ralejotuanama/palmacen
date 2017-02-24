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
                <h5>Solicitar Orden De Servicio</h5>
            </div>
            <div class="widget-content nopadding">
                

                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalles de la Orden</a></li>
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
                                            <label for="cliente">Cliente<span class="required">*</span></label>
                                            <input id="cliente" class="span12" type="text" name="cliente" value="<?php echo $result->nomeCliente; ?>" disabled />
                                            <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value="<?php echo $result->idClientes; ?>"  />
                                        <!--<div class="span6">
                                        <a href="#modalCliente" data-toggle="modal" role="button" class="btn btn-success tip-bottom" title="Registrar Nuevo Cliente"><i class="icon-plus icon-white"></i> Nuevo Cliente</a>  
                                        </div>-->
                                        </div>
                                        <div class="span6">                                            
                                            <input type="hidden" id="tecnico" class="span12" name="tecnico" value="Por Asignar"  disabled />
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="1" />
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span3">
                                           <!-- <label for="status">Estado<span class="required">*</span></label>-->
                                           <input class="span12" name="status" id="status" value="PENDIENTE ASIGNAR TÉCNICO" type="hidden"/>
                                                
                                        </div>
                                        <div class="span3">
                                            <!-- <label for="dataInicial">Fecha Inicial<span class="required">*</span></label>-->
                                            <input id="dataInicial" class="span12 datepicker" type="hidden" name="dataInicial" value="<?php echo date("d/m/y");?>"  />
                                        </div>
                                        <div class="span3">
                                            <!--<label for="dataFinal">Fecha Final</label>-->
                                            <input id="dataFinal" class="span12 datepicker" type="hidden" name="dataFinal" value="01/01/1970"  />
                                        </div>

                                        <div class="span3">
                                           <!-- <label for="garantia">Garantía</label> -->
                                            <input id="garantia" type="hidden" class="span12" name="garantia" value="0"  />
                                        </div>
                                    </div>

                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <label> Descripción del Equipo (Completar si es necesario)</label>
                                    </div>

                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        
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
                                            <label for="serie">Numero de Serie</label>
                                            <input id="serie" type="text" class="span12" name="serie" value=""  />
                                        </div>
                                    </div>

                                    <div class="span12" style="padding: 1%; margin-left: 0">

                                        <div class="span6">
                                            <label for="descricaoProduto">Descripción Produto/Servicio</label>
                                            <textarea class="span12" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5"></textarea>
                                                                                  
                                        </div>
                                        <div class="span6">
                                            <label for="defeito">Defecto</label>
                                            <textarea class="span12" name="defeito" id="defeito" cols="30" rows="5" placeholder="describa el problema que presenta su producto"></textarea>
                                        </div>

                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6">
                                            <label for="observacoes">Observaciones</label>
                                            <textarea class="span12" name="observacoes" id="observacoes" cols="30" rows="5" placeholder="agregue aqui cualquier informacion adicional"></textarea>
                                        </div>
                                       <!-- <div class="span6">
                                            <label for="laudoTecnico">Diagnóstico Técnico</label>
                                            <textarea class="span12" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5"></textarea>
                                        </div>-->
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <button class="btn btn-success" id="btnContinuar"><i class="icon-share-alt icon-white"></i> Continuar</button>
                                            <a href="<?php echo base_url() ?>index.php/conecte/os/" class="btn"><i class="icon-arrow-left"></i> Volver</a>
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





            </div>
        </div>
    </div>
</div>


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

    $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
   
});

</script>