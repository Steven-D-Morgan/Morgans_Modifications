

```
sudo su
```
```
apt-get update
```
```
apt-get upgrade
```
```
apt-get dist-upgrade
```
**Set A Static IP Address from your Router**
**REBOOT**
```
timedatectl
```
```
timedatectl status
```
```
timedatectl list-timezones
```
```
timedatectl set-timezone America/New_York
```
** Now lets begin setting up NextCloud**
```
apt install apache2 mariadb-server php php-cli php-fpm php-json php-intl php-imagick php-pdo php-mysql php-zip php-gd php-mbstring php-curl php-xml php-pear php-bcmath apache2 libapache2-mod-php -y
```
```
nano /etc/php/8.1/apache2/php.ini
```
```
date.timezone = UTC
memory_limit = 512M
upload_max_filesize = 500M
post_max_size = 500M
max_execution_time = 300
```
** ctrl + x**
```
mysql
```
```
CREATE DATABASE nextcloud;
CREATE USER 'nextcloud'@'localhost' identified by 'password';
```
```
GRANT ALL PRIVILEGES ON nextcloud.* TO 'nextcloud'@'localhost';
```
```
FLUSH PRIVILEGES;
QUIT;
```
**[NextCloud Releases Directory](https://download.nextcloud.com/server/releases/)**
```
wget https://download.nextcloud.com/server/releases/nextcloud-26.0.1.zip
```
```
unzip nextcloud-26.0.1.zip
```
```
mv nextcloud /var/www/html/
```
```

```
```

```
```

```
```

```
```

```
```

```
```

```
