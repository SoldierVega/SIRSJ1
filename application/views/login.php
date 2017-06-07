<?php
	$username = array('name' => 'username', 'placeholder' => 'Usuario', 'class' => 'form-control');
	$password = array('name' => 'password',	'placeholder' => 'Password', 'class' => 'form-control');
	$submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión', 'class' => 'btn btn-lg btn-success btn-block');
	?>
            
            
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 ">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <center>
                    <h3 class="panel-title">Por favor inicia session.</h3>
                    </center>
                </div>
		<div class="panel-body">
                    <?=form_open(base_url().'login/new_user')?>
                    <fieldset>
                        <div class="form-group">      
                            <?=form_input($username)?><p><?=form_error('username')?></p>
                        </div>
                        <div class="form-group">
                            <?=form_password($password)?><p><?=form_error('password')?></p>
                        </div>
                            <?=form_hidden('token',$token)?>
                            <?=form_submit($submit)?>
                            <?=form_close()?>
                                <?php 
                                    if($this->session->flashdata('usuario_incorrecto')){
                                ?>
                                    <p><?=$this->session->flashdata('usuario_incorrecto')?></p>
				<?php
                                    }
				?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>     