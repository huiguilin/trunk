<?php
return array(
	//'配置项'=>'配置值'
	'APP_GROUP_LIST' => 'Home,Admin',
	'DEFAULT_GROUP' => 'Home',
    // 添加数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'monkey', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'linhuazhu123', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 't_monkey_', // 数据库表前缀

    'SMTP_SERVER' => 'smtp.163.com',  // 邮件服务器
    'SMTP_PORT' => '25',  // 邮件服务器端口
    'SMTP_USER_EMAIL' => 'linhuazhuab@163.com',  // SMTP服务器的用户邮箱(一般发件人也得用这个邮箱)
    'SMTP_USER' => 'linhuazhuab@163.com',  // SMTP服务器账户名
    'SMTP_PWD' => 'linhuazhU123',  // SMTP服务器账户密码
    'SMTP_MAIL_TYPE' => 'HTML',  // 发送邮件类型:HTML,TXT(注意都是大写)
    'SMTP_TIME_OUT' => 30,  // 超时时间
    'SMTP_AUTH' => true , //邮箱验证(一般都要开启),

    'URL_CASE_INSENSITIVE' =>true, //URL大小写
   
    // 'SHOW_PAGE_TRACE' => true,
        
);
?>
