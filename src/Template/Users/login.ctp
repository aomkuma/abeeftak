
<div class="row justify-content-center">
    <div class="col-sm-8 col-lg-4 col-lg-offset-4">
        <div class="g-brd-around g-brd-gray-light-v4 rounded g-py-40 g-px-30">
            <?= $this->Flash->render() ?>

            <header class="text-center mb-4">
                <h3 class="h2 g-color-black g-font-weight-600">Login</h3>
            </header>

           
            <?= $this->Form->create('login', ['id' => 'frm', 'novalidate' => true, 'class' => 'g-py-15']) ?>
            <div class="mb-4">
                <?= $this->Form->contro('email', ['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15', 'placeholder' => 'johndoe@gmail.com']) ?>

            </div>

            <div class="g-mb-35">
                <?= $this->Form->password('password', ['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15', 'placeholder' => 'password']) ?>

            </div>

            <div class="mb-4">
                <button class="btn btn-md btn-block u-btn-primary g-rounded-50 g-py-13">Login</button>
            </div>
            <?= $this->Form->end() ?>
          


        </div>
    </div>
</div>
