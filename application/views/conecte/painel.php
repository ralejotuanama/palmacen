  <div class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lo span2"> <a href="<?php echo base_url()?>index.php/conecte/os"> <i class="icon-tags"></i> O.S</a> </li>
      <!--<li class="bg_lb span2"> <a href="<?php echo base_url()?>index.php/conecte/aparatos"> <i class="icon-tasks"></i> Aparatos</a> </li>-->
      <li class="bg_ls span2"> <a href="<?php echo base_url()?>index.php/conecte/compras"><i class="icon-shopping-cart"></i> Compras</a></li>
      <li class="bg_lg span2"> <a href="<?php echo base_url()?>index.php/conecte/conta"><i class="icon-star"></i> Mi Cuenta</a></li>
    </ul>
  </div>
 

  <div class="span12" style="margin-left: 0">
      
      <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-signal"></i></span><h5>Últimas Ordenes de Servicio</h5></div>
          <div class="widget-content">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>#O.S</th>
                          <th>Fecha Inicial</th>
                          <th>Fecha Final</th>
                          <th>Garantía</th>
                          <th>Status</th>
                          <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php 
                      if($os != null){
                          foreach ($os as $o) {
                              $dataFinal = date(('d/m/Y'),strtotime($o->dataFinal));
                                echo '<tr>';
                                echo '<td>'.$o->idOs.'</td>';
                                echo '<td>'.date('d/m/Y' ,strtotime($o->dataInicial)).'</td>';
                                if(($o->status ==  "Finalizado") || ($o->status ==  "Facturado")) {echo '<td>'.$dataFinal.'</td>';}
            elseif($o->status ==  "Cancelado") {echo '<td>O.S. cancelada</td>';}
             else {echo '<td>La orden sigue abierta</td>';}
                                echo '<td>'.$o->garantia.'</td>';
                                echo '<td>'.$o->status.'</td>';
                                echo '<td> <a href="'.base_url().'index.php/conecte/visualizarOs/'.$o->idOs.'" class="btn"> <i class="icon-eye-open" ></i> </a></td>';
                                echo '</tr>';
                    
                                
                            }
                        }
                        else{
                          echo '<tr><td colspan="3">Niguna ordem de servicio encontrada.</td></tr>';
                      }    

                      ?>
                  </tbody>
              </table>
          </div>
      </div>

      <div class="widget-box">
          <div class="widget-title"><span class="icon"><i class="icon-signal"></i></span><h5>Últimas Compras</h5></div>
          <div class="widget-content">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Fecha de Venta</th>
                          <th>Responsable</th>
                          <th>Facturado</th>
                          <th>Acción</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php 
                      if($compras != null){
                          foreach ($compras as $p) {
                              if($p->faturado == 1){$faturado = 'Si';} else{$faturado = 'No';}
                              echo '<tr>';
                              echo '<td>'.$p->idVendas.'</td>';
                              echo '<td>'.date('d/m/Y',strtotime($p->dataVenda)).'</td>';
                              echo '<td>'.$p->nome.'</td>';
                              echo '<td>'.$faturado.'</td>';
                              echo '<td> <a href="'.base_url().'index.php/conecte/visualizarCompra/'.$p->idVendas.'" class="btn"> <i class="icon-eye-open" ></i> </a></td>';
                              echo '</tr>';
                          }
                      }
                      else{
                          echo '<tr><td colspan="5">Ninguna venta encontrada.</td></tr>';
                      }    

                      ?>
                  </tbody>
              </table>
          </div>
      </div>
    
  </div>
