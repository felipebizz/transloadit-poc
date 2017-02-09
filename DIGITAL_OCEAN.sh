apt-get update
apt-get -y install git zip unzip composer nginx rabbitmq-server php7.0  php7.0-cli php7.0-common php7.0-curl php7.0-json php7.0-sqlite3 php7.0-fpm php7.0-bcmath php7.0-mbstring php7.0-xml

rabbitmq-plugins enable rabbitmq_management

vim /etc/rabbitmq/rabbitmq.config
[{rabbit, [{loopback_users, []}]}].

vim /etc/php/7.0/fpm/php.ini
cgi.fix_pathinfo=0

vim /etc/nginx/sites-available/default

server {
        listen 80 default_server;
        listen [::]:80 default_server;

        root /var/www/html;

        index index.html index.php;

        server_name 45.55.151.246;

        location / {
                try_files $uri $uri/ =404;
        }

        location ~ \.php$ {
            include snippets/fastcgi-php.conf;
            fastcgi_pass unix:/run/php/php7.0-fpm.sock;
        }

        location ~ /\.ht {
            deny all;
        }

}
systemctl restart php7.0-fpm
systemctl reload nginx