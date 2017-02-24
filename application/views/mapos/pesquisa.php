<div class="span12" style="margin-left: 0; margin-top: 0">
    <div class="span12" style="margin-left: 0">
        <form action="<?php echo current_url()?>">
        <div class="span10" style="margin-left: 0">
            <input type="text" class="span12" name="termo" placeholder="Introduzca el término de búsqueda" />
        </div>
        <div class="span2">
            <button class="span12 btn"><i class=" icon-search"></i> Buscar</button>
        </div>
        </form>
    </div>
    <div class="span12" style="margin-left: 0; margin-top: 0">
    <!--Produtos-->
    <div class="span6" style="margin-left: 0; margin-top: 0">
        <div class="widget-box" style="min-height: 200px">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-barcode"></i>
                </span>
                <h5>Productos</h5>

            </div>

            <div class="widget-content nopadding">

               
                <table class="table table-bordered ">
                    <thead>
                        <tr style="backgroud-color: #2D335B">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Stosk</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($produtos == null){
                            echo '<tr><td colspan="4">Ningún producto fue encontrado.</td></tr>';
                        }
                        foreach ($produtos as $r) {
                            echo '<tr>';
                            echo '<td>' . $r->idProdutos . '</td>';
                            echo '<td>' . $r->descricao . '</td>';
                            echo '<td>' . $r->estoque . '</td>';
                            echo '<td>' . $r->precoVenda . '</td>';

                            echo '<td>';
                            if($this->permission->checkPermission($this->session->userdata('permissao'),'vProduto')){
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/produtos/visualizar/' . $r->idProdutos . '" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>'; 
                            }
                            if($this->permission->checkPermission($this->session->userdata('permissao'),'eProduto')){
                                echo '<a href="' . base_url() . 'index.php/produtos/editar/' . $r->idProdutos . '" class="btn btn-info tip-top" title="Editar Producto"><i class="icon-pencil icon-white"></i></a>'; 
                            } 
                            
                            echo '</td>';
                            echo '</tr>';
                        } ?>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Serviços-->
    <div class="span6">
        <div class="widget-box" style="min-height: 200px">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-wrench"></i>
                </span>
                <h5>Servicios</h5>

            </div>

            <div class="widget-content nopadding">


                <table class="table table-bordered ">
                    <thead>
                        <tr style="backgroud-color: #2D335B">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($servicos == null){
                            echo '<tr><td colspan="4">Ningún servicio fue encontrado.</td></tr>';
                        }
                        foreach ($servicos as $r) {
                            echo '<tr>';
                            echo '<td>' . $r->idServicos . '</td>';
                            echo '<td>' . $r->nome . '</td>';
                            echo '<td>' . $r->preco . '</td>';
                            echo '<td>';
                            if($this->permission->checkPermission($this->session->userdata('permissao'),'eServico')){
                                echo '<a href="' . base_url() . 'index.php/servicos/editar/' . $r->idServicos . '" class="btn btn-info tip-top" title="Editar Servicio"><i class="icon-pencil icon-white"></i></a>'; 
                            } 
                                
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Clientes-->
    <div class="span8" style="margin-left: 0; margin-top: 0">
        <div class="widget-box" style="min-height: 200px">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Clientes</h5>

            </div>

            <div class="widget-content nopadding">


                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>ID #</th>
                            <th>Nombre</th>
                            <th>DNI/NIE/NIF</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($clientes == null){
                            echo '<tr><td colspan="4">Ningúm cliente fue encontrado.</td></tr>';
                        }
                        foreach ($clientes as $r) {
                            echo '<tr>';
                            echo '<td>' . $r->idClientes . '</td>';
                            echo '<td>' . $r->nomeCliente . '</td>';
                            echo '<td>' . $r->documento . '</td>';
                            echo '<td>' . $r->telefone . '</td>';
                            echo '<td>' . $r->email . '</td>';
                            
                            echo '<td>';

                            if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>'; 
                            } 
                            if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
                                echo '<a href="' . base_url() . 'index.php/clientes/editar/' . $r->idClientes . '" class="btn btn-info tip-top" title="Editar Cliente"><i class="icon-pencil icon-white"></i></a>'; 
                            } 
                            
                            
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>

    


    <!--Ordens de Serviço-->
    <div class="span10" style="margin-left: 0; margin-top: 0">
         <div class="widget-box" style="min-height: 200px">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                <h5>Ordenes de Servicio</h5>

            </div>

            <div class="widget-content nopadding">


                <table class="table table-bordered ">
                    <thead>
                        <tr style="backgroud-color: #2D335B">
                            <th>#</th>
                            <th>ID Cliente</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Estado</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Serie</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($os == null){
                            echo '<tr><td colspan="4">Ninguna OS fue encontrada.</td></tr>';
                        }
                        foreach ($os as $r) {
                            $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                            $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                            echo '<tr>';
                            echo '<td>' . $r->idOs . '</td>';
                            echo '<td>' . $r->clientes_id . '</td>';
                            echo '<td>' . $dataInicial . '</td>';
                            echo '<td>' . $dataFinal . '</td>';
                            echo '<td>' . $r->status . '</td>';
                            echo '<td>' . $r->marca . '</td>';
                            echo '<td>' . $r->modelo . '</td>';
                            echo '<td>' . $r->serie . '</td>';
                            echo '<td>';
                            if($this->permission->checkPermission($this->session->userdata('permissao'),'vOs')){
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>'; 
                            } 
                            if($this->permission->checkPermission($this->session->userdata('permissao'),'eOs')){
                                echo '<a href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn btn-info tip-top" title="Editar OS"><i class="icon-pencil icon-white"></i></a>'; 
                            }  
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!--Aparatos-->
    <!--<div class="span8" style="margin-left: 0; margin-top: 0">
        <div class="widget-box" style="min-height: 200px">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tasks"></i>
                </span>
                <h5>Equipos</h5>

            </div>

            <div class="widget-content nopadding">


                <table class="table table-bordered ">
                    <thead>
                        <tr style="backgroud-color: #2D335B">
                            <th>#</th>
                            <th>ID Cliente</th>
                            <th>Tipo</th>
                            <th>Modelo</th>
                            <th>Nº de Seria</th>
                            <th>Marca</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($aparatos == null){
                            echo '<tr><td colspan="4">Ningúm Aparato fue encontrado.</td></tr>';
                        }
                        foreach ($aparatos as $r) {
                            echo '<tr>';
                            echo '<td>' . $r->aparatos_id . '</td>';
                        	echo '<td>' . $r->IDclientes . '</td>';
                        	echo '<td>' . $r->tipo . '</td>';
                            echo '<td>' . $r->modelo . '</td>';
                            echo '<td>' . $r->n_serie . '</td>';
                            echo '<td>' . $r->marca . '</td>';
                            
                            echo '<td>';
                            if($this->permission->checkPermission($this->session->userdata('permissao'),'vaparatos')){
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/conecte/aparatos/' . $r->aparatos_id . '" class="btn tip-top" title="Ver mas detalles"><i class="icon-eye-open"></i></a>'; 
                            } 
                            if($this->permission->checkPermission($this->session->userdata('permissao'),'eaparatos')){
                                echo '<a href="' . base_url() . 'index.php/conecte/aparatos/' . $r->aparatos_id . '" class="btn btn-info tip-top" title="Editar Aparatos"><i class="icon-pencil icon-white"></i></a>'; 
                            }  
                            echo '</td>';
                            
                            echo '</tr>';
                        }
                        ?>
                        <tr>-->

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>



</div>

