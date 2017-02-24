<div class="span12" style="margin-left: 0">
    <form action="<?php echo base_url();?>index.php/permissoes/adicionar" id="formPermissao" method="post">

    <div class="span12" style="margin-left: 0">
        
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-lock"></i>
                </span>
                <h5>Registrar Permisos</h5>
            </div>
            <div class="widget-content">
                
                <div class="span6">
                    <label>Nombre del Permiso</label>
                    <input name="nome" type="text" id="nome" class="span12" />

                </div>
                <div class="span6">
                    <br/>
                    <label>
                        <input name="marcarTodos" type="checkbox" value="1" id="marcarTodos" />
                        <span class="lbl"> Marcar Todos</span>

                    </label>
                    <br/>
                </div>

                <div class="control-group">
                    <label for="documento" class="control-label"></label>
                    <div class="controls">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>

                                    <td>
                                        <label>
                                            <input name="vCliente" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Cliente</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aCliente" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Cliente</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eCliente" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Cliente</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input name="dCliente" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Cliente</span>
                                        </label>
                                    </td>
                                 
                                </tr>

                                <tr><td colspan="4"></td></tr>
                                <tr>

                                    <td>
                                        <label>
                                            <input name="vProduto" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Producto</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aProduto" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Producto</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eProduto" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Producto</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="dProduto" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Producto</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                <!--<tr><td colspan="4"></td></tr>
                                <tr>

                                    <td>
                                        <label>
                                            <input name="vaparatos" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Equipos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aaparatos" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Equipos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eaparatos" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Equipos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="daparatos" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Equipos</span>
                                        </label>
                                    </td>
                                 
                                </tr>-->                                
                                <tr><td colspan="4"></td></tr>
                                
                                <tr>

                                    <td>
                                        <label>
                                            <input name="vServico" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Servicio</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aServico" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Servicio</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eServico" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Servicio</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="dServico" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Servicio</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                
                                <tr><td colspan="4"></td></tr>
                                <tr>

                                    <td>
                                        <label>
                                            <input name="vOs" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar O.S</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aOs" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar O.S</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eOs" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar O.S</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="dOs" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar O.S</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                <tr><td colspan="4"></td></tr>
                                
                                <tr>

                                    <td>
                                        <label>
                                            <input name="vVenda" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Venta</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aVenda" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Venta</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eVenda" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Venta</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="dVenda" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Venta</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                
                                <tr><td colspan="4"></td></tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input name="vArquivo" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Archivos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aArquivo" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Archivos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eArquivo" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Archivos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="dArquivo" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Archivos</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                
                                <tr><td colspan="4"></td></tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input name="vLancamento" class="marcar" type="checkbox" checked="checked" value="1" />
                                            <span class="lbl"> Visualizar Movimento Financiero</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="aLancamento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Movimento Financiero</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="eLancamento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Movimento Financiero</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="dLancamento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Movimento Financiero</span>
                                        </label>
                                    </td>
                                 
                                </tr>

                                <tr><td colspan="4"></td></tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input name="rCliente" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe de Cliente</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="rServico" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe de Servicio</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="rOs" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe de O.S</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="rProduto" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe de Producto</span>
                                        </label>
                                    </td>
                                 
                                </tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input name="rVenda" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe de Venta</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="rFinanceiro" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe Financiero</span>
                                        </label>
                                    </td>
                                    <td colspan="2"></td>
                                 
                                </tr>
                                <tr><td colspan="4"></td></tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input name="cUsuario" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Configurar Usuário</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="cEmitente" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Configurar Empresa</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="cPermissao" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Configurar Permisos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input name="cBackup" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Backup</span>
                                        </label>
                                    </td>
                                 
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

              
    
            <div class="form-actions">
                <div class="span12">
                    <div class="span6 offset3">
                        <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar</button>
                        <a href="<?php echo base_url() ?>index.php/permissoes" id="" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
           
            </div>
        </div>

                   
    </div>

</form>

</div>


<script type="text/javascript" src="<?php echo base_url()?>assets/js/validate.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('click', '#marcarTodos', function(event) {
            if($(this).prop('checked')){

              $('.marcar').each(
                 function(){
                    $(this).attr("checked", true);
                 }
              );
           }else{

              $('.marcar').each(
                 function(){
                    $(this).attr("checked", false);
                 }
              );
           }
        });
       

 
    $("#formPermissao").validate({
        rules :{
            nome: {required: true}
        },
        messages:{
            nome: {required: 'Campo obrigatório'}
        }
    });     

        

    });
</script>
