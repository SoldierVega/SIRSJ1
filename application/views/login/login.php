<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Por favor Inicia Session</h3>
                </div>
                <div class="panel-body">
                    <form method="POST"action="<?php echo site_url('/Bienvenido/') ?>">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="usuario" name="email" type="email" autofocus required="TRUE">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" required="TRUE">
                            </div>

                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">Entrar</button>
                            <!--<a class="btn btn-lg btn-success btn-block">Entrar</a>-->
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>