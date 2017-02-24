<?php $totalServico = 0; $totalProdutos = 0;?>
<style type="text/css">
<!--
.Estilo2 {font-size: 9px}
-->
</style>

<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                <h5>Orden de Servicio</h5>
                <div class="buttons">
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eOs')){
                        echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/os/editar/'.$result->idOs.'"><i class="icon-pencil icon-white"></i> Editar</a>'; 
                    } ?>
                    <a id="imprimir" title="Imprimir" class="btn btn-mini btn-inverse" href=""><i class="icon-print icon-white"></i> Imprimir</a>
                </div>
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head" style="margin-bottom: 0">
                        <h6>Comprobante Cliente</h6>
                        <table class="table">
                            <tbody>
                                <?php if($emitente == null) {?>
                                            
                                <tr>
                                    <td colspan="3" class="alert">Debe configurar los datos de la Empresa. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a><<<</td>
                                </tr>
                                <?php } else {?>
                                <tr>
                                    <td style="width: 20%; padding-left: 0"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                                    <td> <span style="font-size: 12px; "><strong> <?php echo $emitente[0]->nome; ?></strong></span> </br><span><?php echo $emitente[0]->cnpj; ?> </br> <?php echo $emitente[0]->rua.', nº:'.$emitente[0]->numero.', '.$emitente[0]->bairro.' </br> '.$emitente[0]->cidade.' - '.$emitente[0]->uf; ?> </span> - <span> E-mail: <?php echo $emitente[0]->email.' </br> Tel.: '.$emitente[0]->telefone; ?></span></td>
                                    <td style="width: 30%; text-align: right">Orden de servicio Nº: <span ><?php echo $result->idOs?></span><hr><span>Fecha Inicio: <?php echo date('d/m/Y',  strtotime($result->dataInicial))?></span>
                                               
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                
                        <table class="table">
                                <tr>
                                    <td style="width: 40%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span><h6><ins>Cliente</ins></h6>
                                            
                                                <p class="Estilo2"><strong>Nombre: </strong><?php echo $result->nomeCliente?><br/>
                                                <strong>Dirección: </strong><?php echo $result->rua?>, <?php echo $result->numero?><br/> 
                                                <strong>Ciudad: </strong><?php echo $result->bairro?>, <?php echo $result->cidade?></p>
                                            </li>
                                        </ul>
                                    </td>
                                    <td style="width: 40%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span><h6><ins>Acceso al Sistema Cliente</ins></h6>
                                            
                                               <p class="Estilo2"><strong>WEB: </strong><?php echo "http://tudominio.com/index.php/conecte"?><br/>
                                               <strong>Email: </strong><?php echo $result->email?><br/>
                                               <strong>Teléfono: </strong><?php echo $result->telefone?></p>
                                            </li>
                                        </ul>
                                    </td>

                                    <td style="width: 50%; padding-left: 0">
                                        <ul>
                                            <li>
                                              <h6 align="right"><span><ins>Recibido por</ins></span></h6>                                           
                                            <span class="Estilo2">
                                               <div align="right">
                                               <span class="Estilo2"><?php echo $result->nome?> <br/>
                                               <strong>Email: </strong><?php echo $result->useremail?></span>
                                            </li>
                                        </ul>    
                                    </td>        
                                </tr>
                        </table> 

                    <div style="margin-top: 0; padding-top: 0">           

            <table class="table">
                <tr>

                    <?php if($result->tipo != null){?>
                    <td><span><strong>Equipo: </strong> <?php echo $result->tipo?></span></td>
                    <?php }?>
             

                    <?php if($result->marca != null){?>
                    <td><span><strong>Marca: </strong> <?php echo $result->marca?></span></td>
                    <?php }?>
                    
                    <?php if($result->modelo != null){?>
                    <td><span><strong>Modelo: </strong> <?php echo $result->modelo?></span></td>
                    <?php }?>
                    
                    <?php if($result->serie != null){?>
                    <td><span><strong>Serie: </strong> <?php echo $result->serie?> </span></td>
                    <?php }?>
                </tr>
            </table>
            </div>
             <table class="table">
             <span class="Estilo2">

                    <?php if($result->descricaoProduto != null){?>
                    <td><span><strong>Descripción: </strong> <?php echo $result->descricaoProduto?> </span></td>
                    <?php }?>
                    
                    <?php if($result->defeito != null){?>
                    <td><span><strong>Defecto: </strong> <?php echo $result->defeito?> </span></td>
                    <?php }?>
            
                    <?php if($result->observacoes != null){?>
                    <td><span><strong>Observaciones: </strong> <?php echo $result->observacoes?> </span></td>   
                    <?php }?>
             </span>
             </table> 
             <hr>
            <table class="table">
                            </p><span class="Estilo2" style="text-align: left">LA EMPRESA NO SE HACE RESPONSABLE POR LA PERDIDA DE DATOS. LAS REPARACIONES DE EQUIPOS INFORMÁTICOS FUERA DE GARANTIA O NO CUBIERTOS POR ELLA TIENEN UNA VALIDES DE 3 MESES</span></p>
                              <p align="center"><span class="Estilo2" style="text-align: left">FIRMA CLIENTE </span></p></td>
            </table>

<hr style="border:1px dotted red; width:900px" /> 
                    <h6>Comprobante Tienda</h6>
                        <table class="table">
                            <tbody>
                                <?php if($emitente == null) {?>
                                            
                                <tr>
                                    <td colspan="3" class="alert">Debe configurar los datos de la Empresa. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a><<<</td>
                                </tr>
                                <?php } else {?>
                                <tr>
                                    <td style="width: 20%; padding-left: 0"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                                    <td> <span style="font-size: 12px; "> <strong><?php echo $emitente[0]->nome; ?></strong></span> </br><span><?php echo $emitente[0]->cnpj; ?> </br> <?php echo $emitente[0]->rua.', nº:'.$emitente[0]->numero.', '.$emitente[0]->bairro.' </br> '.$emitente[0]->cidade.' - '.$emitente[0]->uf; ?> </span> - <span> E-mail: <?php echo $emitente[0]->email.' </br> Tel.: '.$emitente[0]->telefone; ?></span></td>
                                    <td style="width: 30%; text-align: right">Orden de servicio Nº: <span ><?php echo $result->idOs?></span><hr><span>Fecha Inicio: <?php echo date('d/m/Y',  strtotime($result->dataInicial))?></span>
                                               
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>

    
                        <table class="table">
                                    <tr>
                                    <td style="width: 40%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span><h6><ins>Cliente</ins></h6>
                                            
                                                <p class="Estilo2"><strong>Nombre: </strong><?php echo $result->nomeCliente?><br/>
                                                <strong>Dirección: </strong><?php echo $result->rua?>, <?php echo $result->numero?><br/> 
                                                <strong>Ciudad: </strong><?php echo $result->bairro?>, <?php echo $result->cidade?></p>
                                            </li>
                                        </ul>
                                    </td>
                                    <td style="width: 40%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span><h6><ins>Acceso al Sistema Cliente</ins></h6>
                                            
                                               <p class="Estilo2"><strong>WEB: </strong><?php echo "http://ialesos.synology.me/index.php/conecte"?><br/>
                                               <strong>Email: </strong><?php echo $result->email?><br/>
                                               <strong>Teléfono: </strong><?php echo $result->telefone?></p>
                                            </li>
                                        </ul>
                                    </td>

                                    <td style="width: 50%; padding-left: 0">
                                        <ul>
                                            <li>
                                              <h6 align="right"><span><ins>Recibido por</ins></span></h6>                                           
                                            <span class="Estilo2">
                                               <div align="right">
                                               <span class="Estilo2"><?php echo $result->nome?> <br/>
                                               <strong>Email: </strong><?php echo $result->useremail?></span>
                                            </li>
                                        </ul>    
                                    </td>        
                                </tr>
                        </table> 
            
                    <div style="margin-top: 0; padding-top: 0">       

                    <table class="table">
                <tr>

                    <?php if($result->tipo != null){?>
                    <td><span><strong>Equipo: </strong> <?php echo $result->tipo?></span></td>
                    <?php }?>
             

                    <?php if($result->marca != null){?>
                    <td><span><strong>Marca: </strong> <?php echo $result->marca?></span></td>
                    <?php }?>
                    
                    <?php if($result->modelo != null){?>
                    <td><span><strong>Modelo: </strong> <?php echo $result->modelo?></span></td>
                    <?php }?>
                    
                    <?php if($result->serie != null){?>
                    <td><span><strong>Serie: </strong> <?php echo $result->serie?> </span></td>
                    <?php }?>

                </tr>
            </table>
            </div>
            <table class="table">
             <span class="Estilo2">

                    <?php if($result->descricaoProduto != null){?>
                    <td><span><strong>Descripción: </strong> <?php echo $result->descricaoProduto?> </span></td>
                    <?php }?>
                    
                    <?php if($result->defeito != null){?>
                    <td><span><strong>Defecto: </strong> <?php echo $result->defeito?> </span></td>
                    <?php }?>
            
                    <?php if($result->observacoes != null){?>
                    <td><span><strong>Observaciones: </strong> <?php echo $result->observacoes?> </span></td>   
                    <?php }?>
             </span>
             </table> 
             <hr>
            <table class="table">
                            </p><span class="Estilo2" style="text-align: left">LA EMPRESA NO SE HACE RESPONSABLE POR LA PERDIDA DE DATOS. LAS REPARACIONES DE EQUIPOS INFORMÁTICOS FUERA DE GARANTIA O NO CUBIERTOS POR ELLA TIENEN UNA VALIDES DE 3 MESES</span></p>
                              <p align="center"><span class="Estilo2" style="text-align: left">FIRMA CLIENTE </span></p></td>
            </table>
                    
                    
              
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#imprimir").click(function(){         
            PrintElem('#printOs');
        })

        function PrintElem(elem)
        {
            Popup($(elem).html());
        }

        function Popup(data)
        {
            var mywindow = window.open('', 'Guia ', 'height=600,width=800');
            mywindow.document.write('<html><head><title>MAP OS </title>');
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap-responsive.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/matrix-style.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/matrix-media.css' />");


            mywindow.document.write("</head><body >");
            mywindow.document.write(data);
            
            mywindow.document.write("</body></html>");

            setTimeout(function(){
 			mywindow.print();
			}, 100);

            return true;
        }

    });
</script>