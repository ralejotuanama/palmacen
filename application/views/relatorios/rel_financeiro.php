<div class="row-fluid" style="margin-top: 0">
    <div class="span4">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-list-alt"></i>
                </span>
                <h5>Informes Rápidos</h5>
            </div>
            <div class="widget-content">
                <ul class="site-stats">
                    <li><a href="<?php echo base_url()?>index.php/relatorios/financeiroRapid"><i class="icon-user"></i> <small>Informe del mes</small></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="span8">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-list-alt"></i>
                </span>
                <h5>Informes Personalizables</h5>
            </div>
            <div class="widget-content">
                <form action="<?php echo base_url()?>index.php/relatorios/financeiroCustom" method="get">
                <div class="span12 well">
                    
                    <div class="span6">
                        <label for="">Vencimiento de:</label>
                        <input type="date" name="dataInicial" class="span12" />
                    </div>
                    <div class="span6">
                        <label for="">a:</label>
                        <input type="date" name="dataFinal" class="span12" />
                    </div>
                    
                </div>

                <div class="span12 well" style="margin-left: 0">
                    <div class="span6">
                        <label for="">Tipo:</label>
                        <select name="tipo" class="span12">
                            <option value="todos">Todos</option>
                            <option value="ingreso">Ingreso</option>
                            <option value="gasto">Gasto</option>
                        </select>
                    </div>
                    <div class="span6">
                        <label for="">Situación:</label>
                        <select name="situacao" class="span12">
                            <option value="todos">Todos</option>
                            <option value="pago">Pago</option>
                            <option value="pendente">Pendiente</option>
    
                        </select>
                    </div>

                </div>
                <div class="span12" style="margin-left: 0; text-align: center">
                    <input type="reset" class="btn" value="Limpiar" />
                    <button class="btn btn-inverse"><i class="icon-print icon-white"></i> Imprimir</button>
                </div>
                </form>
                &nbsp
            </div>
        </div>
    </div>
</div>