<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">ABEEF TAK</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li><?= $this->Html->link('แผงควบคุม', ['controller' => 'home']) ?></li>
        <li><?= $this->Html->link('ผู้เลี้ยงโค', ['controller' => 'herdsmans']) ?></li>
        <li><?= $this->Html->link('โค', ['controller' => 'Cows','action'=>'index']) ?></li>
        <li><?= $this->Html->link('ฟาร์ม', ['controller' => 'farms']) ?></li>
        
        <li><?= $this->Html->link('รายงาน', ['controller' => 'Reports','action'=>'index']) ?></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-gears fa-fw"></i> ตั้งค่าระบบ <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><?= $this->Html->link('<i class="fa fa-group fa-fw"></i> ผู้ใช้งานระบบ', ['controller' => 'Users'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('<i class="glyphicon glyphicon-grain fa-fw"></i> พันธุ์หญ้า', ['controller' => 'grasses'], ['escape' => false]) ?></li>
            </ul>
        </li>

        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <?php
                $user1 = $this->request->session()->read('Auth.User');
                ?>

                <li><?= $this->Html->link('<i class="fa fa-user fa-fw"></i> User Profile', ['controller' => 'Users', 'action' => 'edit', $user1['id']], ['escape' => false]) ?></li>

                <li class="divider"></li>

                <li><?= $this->Html->link('<i class="fa fa-sign-out fa-fw"></i> Logout', ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>