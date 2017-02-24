<div class="accordion" id="collapse-group">
    <div class="accordion-group widget-box">
        <div class="accordion-heading">
            <div class="widget-title">
                <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                    <span class="icon"><i class="icon-list"></i></span><h5>Datos del Producto</h5>
                </a>
            </div>
        </div>
        <div class="collapse in accordion-body">
            <div class="widget-content">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Descripción</strong></td>
                            <td><?php echo $result->descricao ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Unidad</strong></td>
                            <td><?php echo $result->unidade ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Precio</strong></td>
                            <td>S/. <?php echo $result->precoCompra; ?></td>
                        </tr>
                        <!--<tr>
                            <td style="text-align: right"><strong>Precio de Venta</strong></td>
                            <td>S/.<?php echo $result->precoVenda; ?></td>
                        </tr>-->
                        <tr>
                            <td style="text-align: right"><strong>Stock</strong></td>
                            <td><?php echo $result->estoque; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Stock Mínimo</strong></td>
                            <td><?php echo $result->estoqueMinimo; ?></td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

