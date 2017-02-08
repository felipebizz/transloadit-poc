apt-get update
apt-get -y install nginx rabbitmq-server php7.0  php7.0-cli php7.0-common php7.0-curl php7.0-json php7.0-sqlite3 php7.0-fpm
rabbitmq-plugins enable rabbitmq_management
vim /etc/rabbitmq/rabbitmq.config
[{rabbit, [{loopback_users, []}]}].