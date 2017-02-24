<?php

if(!$results){?>
	<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tags"></i>
         </span>
        <h5>Compras</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Fecha de Compra</th>
            <th>Responsable</th>
            <th>Facturado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="6">Ninguna Compra Registrada</td>
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
        <h5>Compras</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Fecha de Compra</th>
            <th>Responsable</th>
            <th>Facturado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            $dataVenda = date(('d/m/Y'),strtotime($r->dataVenda));
            if($r->faturado == 1){$faturado = 'Si';} else{ $faturado = 'No';}           
            echo '<tr>';
            echo '<td>'.$r->idVendas.'</td>';
            echo '<td>'.$dataVenda.'</td>';
            echo '<td>'.$r->nome.'</td>';
            echo '<td>'.$faturado.'</td>';
            
            echo '<td><a href="'.base_url().'index.php/conecte/visualizarCompra/'.$r->idVendas.'" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>
                     
                      
                  </td>';
            echo '</tr>';
        }?>
        <tr>
            
        </tr>
    </tbody>
</table>
</div>
</div>
	
<?php echo $this->pagination->create_links();}?>




