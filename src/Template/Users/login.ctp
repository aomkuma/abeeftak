
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 style="text-align: center" class="panel-title">LOGIN</h3>
                    </div>
                    <div class="panel-body">
                         <?= $this->Form->create('login', ['id' => 'frm', 'novalidate' => true, 'class' => 'g-py-15']) ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">Login</button>                            </fieldset>
                         <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>