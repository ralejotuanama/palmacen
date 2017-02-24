<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tasks"></i>
                </span>
                <h5>Registrar Equipo</h5>
            </div>
            <div class="widget-content nopadding">
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formaparato" method="post" class="form-horizontal" >
                     <div class="control-group">                        
                        <input id="clid" class="span12" type="hidden" name="clid" value="<?php echo $this->session->userdata('id'); ?>"  />
                        <label for="descricao" class="control-label">Nombre<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nombre" type="text" name="nombre" value="<?php echo set_value('nombre'); ?>"  placeholder="asigne un nombre a su aparato"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="tipo" class="control-label">Tipo<span class="required">*</span></label>
                        <div class="controls">
                            <select id="tipo" type="text" name="tipo" value="<?php echo set_value('tipo'); ?>">
                                <option value=""></option>
                                <option value="TORRE PC">TORRE PC</option>
                                <option value="PORTATIL PC">PORTATIL PC</option>
                                <option value="TORRE MAC">TORRE MAC</option>
                                <option value="PORTATIL MAC">PORTATIL MAC</option>
                                <option value="IMPRESORAS">IMPRESORAS</option>
                                <option value="PERIFERICOS">PERIFERICOS</option>
                                <option value="MONITORES">MONITORES</option>
                                <option value="TV">TV</option>
                                <option value="ROUTER">ROUTER</option>
                                <option value="NAS">NAS</option>
                                <option value="MÓVIL">MÓVIL</option>
                                <option value="HDD MULTIMEDIA">HDD MULTIMEDIA</option> 
                                <option value="HDD/SSD">HDD/SSD</option>
                                <option value="MEMORIA USB">MEMORIA USB</option>
                                <option value="LAVADORA">LAVADORA</option>
                                <option value="NEVERA">NEVERA</option>
                                <option value="AIRE ACONDICIONADO">AIRE ACONDICIONADO</option>
                                <option value="CONGELADOR">CONGELADOR</option>
                                <option value="ESTUFA">ESTUFA</option>  
                                <option value="OTROS">OTROS</option>                    
                            </select>    
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="modelo" class="control-label">Modelo<span class="required">*</span></label>
                        <div class="controls">
                            <input id="modelo" type="text" name="modelo" value="<?php echo set_value('modelo'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="marca" class="control-label">Marca<span class="required">*</span></label>
                        <div class="controls">
                            <input id="marca" type="text" name="marca" value="<?php echo set_value('marca'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="serie" class="control-label">Numero de Serie<span class="required">*</span></label>
                        <div class="controls">
                            <input id="serie" type="text" name="serie" value="<?php echo set_value('estoque'); ?>"  />
                        </div>
                    </div>

                    
                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar</button>
                                <a href="<?php echo base_url() ?>index.php/conecte/aparatos" id="" class="btn"><i class="icon-arrow-left"></i> Volver</a>
                            </div>
                        </div>
                    </div>

                    
                </form>
            </div>

         </div>
     </div>
</div>

<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#formaparato').validate({
            rules :{
                  nombre: { required: true},
                  tipo: { required: true},
                  /* modelo: { required: true},*/
                  marca: { required: true},
                  /* serie: { required: true}*/
            },
            messages:{
                  nombre: { required: 'Campo Requerido.'},
                  tipo: {required: 'Campo Requerido.'},
                  /* modelo: { required: 'Campo Requerido.'},*/
                  marca: { required: 'Campo Requerido.'},
                  /*serie: { required: 'Campo Requerido.'}*/
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
    });
</script>



