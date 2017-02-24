<?php $permissoes = unserialize($result->permissoes);?>
<div class="span12" style="margin-left: 0">
    <form action="<?php echo base_url();?>index.php/permissoes/editar" id="formPermissao" method="post">

    <div class="span12" style="margin-left: 0">
        
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-lock"></i>
                </span>
                <h5>Editar Permisos</h5>
            </div>
            <div class="widget-content">
                
                <div class="span4">
                    <label>Nombre del Permiso</label>
                    <input name="nome" type="text" id="nome" class="span12" value="<?php echo $result->nome; ?>" />
                    <input type="hidden" name="idPermissao" value="<?php echo $result->idPermissao; ?>">

                </div>

                <div class="span3">
                    <label>Situación</label>
                    
                    <select name="situacao" id="situacao" class="span12">
                        <?php if($result->situacao == 1){$sim = 'selected'; $nao ='';}else{$sim = ''; $nao ='selected';}?>
                        <option value="1" <?php echo $sim;?>>Activo</option>
                        <option value="0" <?php echo $nao;?>>Inactivo</option>
                    </select>

                </div>
                <div class="span4">
                    <br/>
                    <label>
                        <input name="" type="checkbox" value="1" id="marcarTodos" />
                        <span class="lbl"> Marcar Todos</span>
                
                    </label>
                    <br/>
                </div>
                <div class="control-group">
                    <label for="documento" class="control-label"></label>
                    <div class="controls">
                </div>
                </div>                               
                        <table class="table table-bordered">
                            <tbody>
                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['vCliente'])){ if($permissoes['vCliente'] == '1'){echo 'checked';}}?> name="vCliente" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Cliente</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['aCliente'])){ if($permissoes['aCliente'] == '1'){echo 'checked';}}?> name="aCliente" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Cliente</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['eCliente'])){ if($permissoes['eCliente'] == '1'){echo 'checked';}}?> name="eCliente" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Cliente</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['dCliente'])){ if($permissoes['dCliente'] == '1'){echo 'checked';}}?> name="dCliente" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Cliente</span>
                                        </label>
                                    </td>
                                 
                                </tr>

                                <tr><td colspan="4"></td></tr>
                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['vProduto'])){ if($permissoes['vProduto'] == '1'){echo 'checked';}}?> name="vProduto" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Producto</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['aProduto'])){ if($permissoes['aProduto'] == '1'){echo 'checked';}}?> name="aProduto" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Producto</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['eProduto'])){ if($permissoes['eProduto'] == '1'){echo 'checked';}}?> name="eProduto" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Producto</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['dProduto'])){ if($permissoes['dProduto'] == '1'){echo 'checked';}}?> name="dProduto" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Producto</span>
                                        </label>
                                    </td>
                         
                                </tr>

                                <!--<tr><td colspan="4"></td></tr>
                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['vaparatos'])){ if($permissoes['vaparatos'] == '1'){echo 'checked';}}?> name="vaparatos" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Equipos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['aaparatos'])){ if($permissoes['aaparatos'] == '1'){echo 'checked';}}?> name="aaparatos" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Equipos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['eaparatos'])){ if($permissoes['eaparatos'] == '1'){echo 'checked';}}?> name="eaparatos" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Equipos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['daparatos'])){ if($permissoes['daparatos'] == '1'){echo 'checked';}}?> name="daparatos" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Equipos</span>
                                        </label>
                                    </td>
                                 
                                </tr> -->                                
                                <tr><td colspan="4"></td></tr>
                                
                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['vServico'])){ if($permissoes['vServico'] == '1'){echo 'checked';}}?> name="vServico" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Servicio</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['aServico'])){ if($permissoes['aServico'] == '1'){echo 'checked';}}?> name="aServico" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Servicio</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['eServico'])){ if($permissoes['eServico'] == '1'){echo 'checked';}}?> name="eServico" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Servicio</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['dServico'])){ if($permissoes['dServico'] == '1'){echo 'checked';}}?> name="dServico" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Servicio</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                
                                <tr><td colspan="4"></td></tr>
                                
                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['vOs'])){ if($permissoes['vOs'] == '1'){echo 'checked';}}?> name="vOs" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar O.S</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['aOs'])){ if($permissoes['aOs'] == '1'){echo 'checked';}}?> name="aOs" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar O.S</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['eOs'])){ if($permissoes['eOs'] == '1'){echo 'checked';}}?> name="eOs" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar O.S</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['dOs'])){ if($permissoes['dOs'] == '1'){echo 'checked';}}?> name="dOs" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar O.S</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                <tr><td colspan="4"></td></tr>
                                
                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['vVenda'])){ if($permissoes['vVenda'] == '1'){echo 'checked';}}?> name="vVenda" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Venta</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['aVenda'])){ if($permissoes['aVenda'] == '1'){echo 'checked';}}?> name="aVenda" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Venta</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['eVenda'])){ if($permissoes['eVenda'] == '1'){echo 'checked';}}?> name="eVenda" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Venta</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['dVenda'])){ if($permissoes['dVenda'] == '1'){echo 'checked';}}?> name="dVenda" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Venta</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                
                                <tr><td colspan="4"></td></tr>

                                <tr>
                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['vArquivo'])){ if($permissoes['vArquivo'] == '1'){echo 'checked';}}?> name="vArquivo" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Archivos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['aArquivo'])){ if($permissoes['aArquivo'] == '1'){echo 'checked';}}?> name="aArquivo" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Archivos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['eArquivo'])){ if($permissoes['eArquivo'] == '1'){echo 'checked';}}?> name="eArquivo" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Archivos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['dArquivo'])){ if($permissoes['dArquivo'] == '1'){echo 'checked';}}?> name="dArquivo" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Archivos</span>
                                        </label>
                                    </td>
                                 
                                </tr>
                                
                                <tr><td colspan="4"></td></tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['vLancamento'])){ if($permissoes['vLancamento'] == '1'){echo 'checked';}}?> name="vLancamento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Visualizar Movimento Financiero</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['aLancamento'])){ if($permissoes['aLancamento'] == '1'){echo 'checked';}}?> name="aLancamento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Agregar Movimento Financiero</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['eLancamento'])){ if($permissoes['eLancamento'] == '1'){echo 'checked';}}?> name="eLancamento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Editar Movimento Financiero</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['dLancamento'])){ if($permissoes['dLancamento'] == '1'){echo 'checked';}}?> name="dLancamento" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Eliminar Movimento Financiero</span>
                                        </label>
                                    </td>
                                 
                                </tr>

                                <tr><td colspan="4"></td></tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['rCliente'])){ if($permissoes['rCliente'] == '1'){echo 'checked';}}?> name="rCliente" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe Cliente</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['rServico'])){ if($permissoes['rServico'] == '1'){echo 'checked';}}?> name="rServico" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe Servicio</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['rOs'])){ if($permissoes['rOs'] == '1'){echo 'checked';}}?> name="rOs" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe de O.S</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['rProduto'])){ if($permissoes['rProduto'] == '1'){echo 'checked';}}?> name="rProduto" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe de Productos</span>
                                        </label>
                                    </td>
                                 
                                </tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['rVenda'])){ if($permissoes['rVenda'] == '1'){echo 'checked';}}?> name="rVenda" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe de Ventas</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['rFinanceiro'])){ if($permissoes['rFinanceiro'] == '1'){echo 'checked';}}?> name="rFinanceiro" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Informe Financiero</span>
                                        </label>
                                    </td>
                                    <td colspan="2"></td>
                                 
                                </tr>
                                <tr><td colspan="4"></td></tr>

                                <tr>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['cUsuario'])){ if($permissoes['cUsuario'] == '1'){echo 'checked';}}?> name="cUsuario" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Configurar Usuário</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['cEmitente'])){ if($permissoes['cEmitente'] == '1'){echo 'checked';}}?> name="cEmitente" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Configurar Empresa</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['cPermissao'])){ if($permissoes['cPermissao'] == '1'){echo 'checked';}}?> name="cPermissao" class="marcar" type="checkbox" value="1" />
                                            <span class="lbl"> Configurar Permisos</span>
                                        </label>
                                    </td>

                                    <td>
                                        <label>
                                            <input <?php if(isset($permissoes['cBackup'])){ if($permissoes['cBackup'] == '1'){echo 'checked';}}?> name="cBackup" class="marcar" type="checkbox" value="1" />
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
                        <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Modificar</button>
                        <a href="<?php echo base_url() ?>index.php/permissoes" id="" class="btn"><i class="icon-arrow-left"></i> Volverr</a>
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


        $("#marcarTodos").click(function(){

            if ($(this).attr("checked")){
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
