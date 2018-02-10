
<div class="container">

    <div class="row" style="">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-3" style="margin-top:5%">
     
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
                <?= $this->Html->image('logo/A-BEEF-DEMO-07.png', ['alt' => '','height'=>'100px']); ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
                <?= $this->Html->image('logo/logo-baan-20-12-60.png', ['alt' => '','height'=>'100px']); ?>
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-3">
            
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 style="text-align: center" class="panel-title">LOGIN</h3>
                </div>
                <div class="panel-body">
                    <?= $this->Form->create('login', ['id' => 'login', 'novalidate' => true, 'class' => 'g-py-15']) ?>
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus id="email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="" id="password">
                        </div>

                        <!-- Change this to a button or input when using this as a form -->
                        <button class="btn btn-lg btn-success btn-block">Login</button>                            </fieldset>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>