# NewCode
小型的博客系统

nginx配置：;
server {
     listen       80;
     server_name  t2.com;

     root G:\\pangtoutuo\\newCode;
     index  index.html index.htm index.php;

     location / {
         try_files $uri $uri/ /index.php$uri;
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

PHP7.0+;
Redis
