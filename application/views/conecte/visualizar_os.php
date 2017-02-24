<?php $totalServico = 0; $totalProdutos = 0;?>
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                <h5>Orden de Servicio</h5>
                <div class="buttons">
                    
                    <a id="imprimir" title="Imprimir" class="btn btn-mini btn-inverse" href=""><i class="icon-print icon-white"></i> Imprimir</a>
                </div>
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head" style="margin-bottom: 0">

                        <table class="table">
                            <tbody>
                                <?php if($emitente == null) {?>
                                            
                                <tr>
                                    <td colspan="3" class="alert">Los datos de la empresa no se han configurado.</td>
                                </tr>
                                <?php } else {?>
                                <tr>
                                    <td style="width: 20%; padding-left: 0"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                                    <td> <span style="font-size: 18px; "> <?php echo $emitente[0]->nome; ?></span> </br><span><?php echo $emitente[0]->cnpj; ?> </br> <?php echo $emitente[0]->rua.', nº:'.$emitente[0]->numero.', '.$emitente[0]->bairro.' </br> '.$emitente[0]->cidade.' - '.$emitente[0]->uf; ?> </span> </br> <span> E-mail: <?php echo $emitente[0]->email.' </br> Tel.: '.$emitente[0]->telefone; ?></span></td>
                                    <td style="width: 30%; text-align: right">Orden de servicio Nº: <span ><?php echo $result->idOs?></span><hr><span>Fecha Inicio: <?php echo date('d/m/Y',  strtotime($result->dataInicial))?></span><br><br><span>Fecha Cierre: <?php $result->status; $dataFinal = date(('d/m/Y'),strtotime($result->dataFinal));if(($result->status ==  "Finalizado") || ($result->status ==  "Facturado")){echo "$dataFinal";}
             elseif($result->status ==  "Cancelado"){echo 'O.S Cancelada';}
             elseif($result->status ==  "Presupuesto"){echo 'Con Presupuesto';}                       
             else{echo 'Sin finalizar';} ?></span>
                                               
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>

                
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 40%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span><h5>Cliente</h5>
                                                <span><strong>Nombre: </strong><?php echo $result->nomeCliente?></span><br/>
                                                <span><strong>Dirección: </strong><?php echo $result->rua?>, <?php echo $result->numero?></span><br/> 
                                                <span><strong>Ciudad: </strong><?php echo $result->bairro?>, <?php echo $result->cidade?></span><br/>
                                                <span><strong>Email: </strong><?php echo $result->email?></span><br/>
                                                <span><strong>Teléfono: </strong><?php echo $result->telefone?></span><br/>
                                            </li>
                                        </ul>
                                    </td>

                                    <td style="width: 50%; padding-left: 0">
                                        <ul>
                                            <li>
                                              <h5 align="right"><span>Técnico / Responsable</span></h5>
                                                <div align="right"><span><?php echo $result->nome?></span> <br/>
                                                <span>Email: <?php echo $result->useremail?></span></div>
                                            </li>
                                            <hr>
                                            <li>
                                                <span><h5>Acceso al Sistema Cliente</h5>
                                                <span><?php echo "http://tudominio.com/index.php/conecte"?></span>
                                                <div style="margin-top: 0; padding-top: 0">

                                            </li>

                                        </ul>
                                    </td>   
                                </tr>
                            </tbody>
                        </table> 
      
                    </div>

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

                    <?php if($result->descricaoProduto != null){?>
                    <hr style="margin-top: 0">
                    <h5>Descripción</h5>
                    <p>
                        <?php echo $result->descricaoProduto?>
                    
                                                
                    </p>
                    <?php }?>

                    <?php if($result->status != null){?>
                    <hr style="margin-top: 0">
                    <h5>Estado</h5>
                    <p>
                        <?php echo $result->status?>
                    </p>

                    <?php }?>

                    <?php if($result->defeito != null){?>
                    <hr style="margin-top: 0">
                    <h5>Defecto</h5>
                    <p>
                        <?php echo $result->defeito?>
                    </p>
                    <?php }?>
                    
                    <?php if($result->observacoes != null){?>
                    <hr style="margin-top: 0">
                    <h5>Observaciones</h5>
                    <p>
                        <?php echo $result->observacoes?>
                    </p>
                    <?php }?>
                    <?php if($result->laudoTecnico != null){?>
                    <hr style="margin-top: 0">
                    <h5>Diagnóstico Técnico</h5>
                    <p>
                        <?php echo $result->laudoTecnico?>
                    </p>
                    <?php }?>

                        <?php if($produtos != null){?>
                        <br />
                        <table class="table table-bordered" id="tblProdutos">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Sub-total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        foreach ($produtos as $p) {

                                            $totalProdutos = $totalProdutos + $p->subTotal;
                                            echo '<tr>';
                                            echo '<td>'.$p->descricao.'</td>';
                                            echo '<td>'.$p->quantidade.'</td>';
                                            
                                            echo '<td>€ '.number_format($p->subTotal,2,',','.').'</td>';
                                            echo '</tr>';
                                        }?>

                                        <tr>
                                            <td colspan="2" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>€ <?php echo number_format($totalProdutos,2,',','.');?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                               <?php }?>
                        
                        <?php if($servicos != null){?>
                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Servicio</th>
                                                <th>Sub-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        setlocale(LC_MONETARY, 'en_US');
                                        foreach ($servicos as $s) {
                                            $preco = $s->preco;
                                            $totalServico = $totalServico + $preco;
                                            echo '<tr>';
                                            echo '<td>'.$s->nome.'</td>';
                                            echo '<td>€ '.number_format($s->preco, 2, ',', '.').'</td>';
                                            echo '</tr>';
                                        }?>

                                        <tr>
                                            <td colspan="1" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>€ <?php  echo number_format($totalServico, 2, ',', '.');?></strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                        <?php }?>
                        <hr />
                    
                        <h4 style="text-align: right">Valor Total: € <?php echo number_format($totalProdutos + $totalServico,2,',','.');?></h4>

                    </div>
                
              
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
            var mywindow = window.open('', 'MAP OS ', 'height=600,width=800');
            mywindow.document.write('<html><head><title>MAP OS </title>');
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap.min.css' /><link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap-responsive.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/matrix-style.css' /> <link rel='stylesheet' href='<?php echo base_url();?>assets/css/matrix-media.css' />");


            mywindow.document.write('</head><body >');
            mywindow.document.write(data);
            mywindow.document.write('</body></html>');

            setTimeout(function(){
 			mywindow.print();
			}, 100);

            return true;
        }

    });
</script>