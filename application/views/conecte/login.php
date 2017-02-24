<!DOCTYPE html>
<html lang="es">
    
<head>
        <title>MAP OS </title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/matrix-login1.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <script src="<?php echo base_url()?>js/jquery-1.10.2.min.js"></script>
    </head>
    <body>
        <div id="loginbox">            
            <form  class="form-vertical" id="formLogin" method="post" action="<?php echo base_url()?>index.php/conecte/login">

                  <?php if($this->session->flashdata('error') != null){?>
                        <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <?php echo $this->session->flashdata('error');?>
                       </div>
                  <?php }?>

                  <?php if($this->session->flashdata('success') != null){?>
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <?php echo $this->session->flashdata('success');?>
                       </div>
                  <?php }?>

                <div class="control-group normal_text"> <h3><img src="<?php echo base_url()?>assets/img/logo2.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input id="email" name="email" type="text" placeholder="Email" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-star"></i></span><input name="telefone" type="text" placeholder="Teléfono | Ej: 99999999" />
                        </div>
                    </div>
                </div>
                <div class="form-actions" style="text-align: center">
                    <button class="btn btn-info btn-large"/> Acceder</button>
                <input type="button" value="Volver" class="btn btn-danger btn-large" id="btnRouter" onclick="location.href = '#'">
                <br>
                <h6>Si aún no esta registrado en nuestra empresa puede hacerlo aquí</h6>
                <a href="#modalCliente" data-toggle="modal" role="button" class="btn btn-success btn-large" title="Registrase como nuevo Cliente"><i class=""></i> Registrarse</a>
                </div>
            </form>
       
        </div>
        
        
        
        
        
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>js/jquery.validate.js"></script>




        <script type="text/javascript">
            $(document).ready(function(){

                $('#email').focus();
                $("#formLogin").validate({
                     rules :{
                          email: { required: true, email: true},
                          senha: { required: true}
                    },
                    messages:{
                          email: { required: 'Campo Requerido.', email: 'Introduzca un Email vÃ¡lido'},
                          senha: {required: 'Campo Requerido.'}
                    },
                   submitHandler: function( form ){       
                         var dados = $( form ).serialize();
                         
                    
                        $.ajax({
                          type: "POST",
                          url: "<?php echo base_url();?>index.php/conecte/login?ajax=true",
                          data: dados,
                          dataType: 'json',
                          success: function(data)
                          {
                            if(data.result == true){
                                window.location.href = "<?php echo base_url();?>index.php/conecte/painel";
                            }
                            else{
                                $('#call-modal').trigger('click');
                            }
                          }
                          });

                          return false;
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



        <a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">notification</a>

        <div id="notification" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
            <h4 id="myModalLabel">MAP OS </h4>
          </div>
          <div class="modal-body">
            <h5 style="text-align: center">Los datos de acceso son incorrectos, por favor intentelo nuevamente!</h5>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>

          </div>
        </div>
        
<!-- Modal Cliente-->        
        <div id="modalCliente" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="formClientes" action="<?php echo base_url() ?>index.php/conecte/adicionarCo" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
    <h3 id="myModalLabel">MAP OS  - Registrarse como nuevo Cliente</h3>
  </div>
  <div class="modal-body">
    <div class="widget-content nopadding">
                
                     <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <label for="nomeCliente" class="control-label">Nombre<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nomeCliente" type="text" name="nomeCliente" value="<?php echo set_value('nomeCliente'); ?>" placeholder="Nombre completo" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="documento" class="control-label">DNI/NIE/NIF<span class="required">*</span></label>
                        <div class="controls">
                            <input id="documento" type="text" name="documento" value="<?php echo set_value('documento'); ?>" placeholder="" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="telefone" class="control-label">Teléfono<span class="required">*</span></label>
                        <div class="controls">
                            <input id="telefone" type="text" name="telefone" value="<?php echo set_value('telefone'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="celular" class="control-label">Tel. Móvil</label>
                        <div class="controls">
                            <input id="celular" type="text" name="celular" value="<?php echo set_value('celular'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="rua" class="control-label">Dirección<span class="required">*</span></label>
                        <div class="controls">
                            <input id="rua" type="text" name="rua" value="<?php echo set_value('rua'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="numero" class="control-label">Número<span class="required">*</span></label>
                        <div class="controls">
                            <input id="numero" type="text" name="numero" value="<?php echo set_value('numero'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="bairro" class="control-label">Barrio<span class="required">*</span></label>
                        <div class="controls">
                            <input id="bairro" type="text" name="bairro" value="<?php echo set_value('bairro'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="cidade" class="control-label">Ciudad<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cidade" type="text" name="cidade" value="<?php echo set_value('cidade'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="estado" class="control-label">País<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estado" type="text" name="estado" value="<?php echo set_value('estado'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="cep" class="control-label">CP<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cep" type="text" name="cep" value="<?php echo set_value('cep'); ?>"  />
                        </div>
                    </div>



                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar</button>
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    </body>

</html>











