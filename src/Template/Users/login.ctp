
<div class="container">

    <div class="row" style="">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3" style="padding-top: 5%;">
     
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
                <?= $this->Html->image('logo/abeef-logo.png', ['alt' => '','height'=>'100px','class'=>'img-responsive']); ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center">
                <?= $this->Html->image('logo/a-logo.png', ['alt' => '','height'=>'100px','class'=>'img-responsive']); ?>
            </div>

        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
            
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 style="text-align: center" class="panel-title">เข้าสู่ระบบ</h3>
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
                        <button class="btn btn-lg btn-success btn-block">ตกลง</button>                            </fieldset>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>