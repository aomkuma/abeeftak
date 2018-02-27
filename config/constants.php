<?php 

/*Client db*/
define('DB_NAME', 'abeef');
define('DB_USER', 'root');
define('DB_PASS', '');



/***********BUTTON*********/
define('BT_ADD', '<button type="button" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> เพิ่ม</button>');
define('BT_BACK', '<button type="button" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> กลับ</button>');
define('BT_EDIT', '<button class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></button>');
define('BT_VIEW', '<button class="btn btn-info btn-sm"><span class="fa fa-eye"></span></button>');
define('BT_DELETE', '<button type="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>');
define('BT_ADDUSER', '<button type="button" class="btn btn-info btn-block"><i class="glyphicon glyphicon-plus"></i> เพิ่มผู้ใช้</button>');
define('PAGE_LIMIT', 20);


define('SITE_URL', $_SERVER['REQUEST_SCHEME'].'://127.0.0.1/Git/abeeftak/');

define('USERPERMISSION','/users/displaypermission');