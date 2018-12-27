# NewCode
小型的博客系统

nginx配置：

     server {
          listen       80;
          server_name  t2.com;

          root G:\\pangtoutuo\\newCode;
          index  index.html index.htm index.php;

          location / {
              try_files $uri $uri/ /index.php?s=$uri&$query_string;
          }

          error_page   500 502 503 504  /50x.html;
          location = /50x.html {
              root   html;
          }

          location ~ \.php(.*)$  {
              fastcgi_split_path_info ^(.+\.php)(.*)$;
              fastcgi_pass backend;
              fastcgi_index index.php;
              fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
              fastcgi_param PATH_INFO $fastcgi_path_info;
              fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
              include fastcgi_params;
          }
     }

PHP7.0+

Redis

Mysql

    create table `user` (
    	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
    	`user` char(6) DEFAULT '' NOT NULL UNIQUE COMMENT '帐号',
    	`password` CHAR(32) DEFAULT '' NOT NULL COMMENT '密码',
    	`start` tinyint(1) DEFAULT 0 NOT NULL COMMENT '用户状态{0:不可用,1:可用}',
    	PRIMARY KEY (`id`),
    	INDEX(`user`,`password`,`start`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='网站后台用户';
    
    CREATE TABLE `visit_log` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
      `ip` varchar(19) COMMENT 'IP',
      `session_id` varchar(100) DEFAULT '' COMMENT '会话ID',
      `course_id` int(10) unsigned DEFAULT 0 COMMENT '进程ID',
      `time` int(10) unsigned DEFAULT 0 COMMENT '时间',
      `operation` VARCHAR(50) DEFAULT '' COMMENT '操作',
      `get` text COMMENT 'get参数',
      `post` text COMMENT 'post参数',
      `http_user_agent` text COMMENT 'HTTP_USER_AGENT参数',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='访问LOG';