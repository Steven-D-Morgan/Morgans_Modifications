

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
## Now lets begin setting up NextCloud ##
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
chown -R www-data:www-data /var/www/html/nextcloud
chmod -R 775 /var/www/html/nextcloud
```
```
nano /etc/apache2/sites-available/next.conf
```
```
<VirtualHost *:80>
     ServerAdmin admin@example.com
     DocumentRoot /var/www/html/nextcloud
     ServerName next.example.com
     ErrorLog /var/log/apache2/nextcloud-error.log
     CustomLog /var/log/apache2/nextcloud-access.log combined
 
    <Directory /var/www/html/nextcloud>
	Options +FollowSymlinks
	AllowOverride All
        Require all granted
 	SetEnv HOME /var/www/html/nextcloud
 	SetEnv HTTP_HOME /var/www/html/nextcloud
 	<IfModule mod_dav.c>
  	  Dav off
        </IfModule>
    </Directory>
</VirtualHost>
```
```
a2ensite next
a2enmod rewrite dir mime env headers
```
```
systemctl restart apache2
```
```
systemctl status apache2
```
** If all went well, should look similar to below **
```
? apache2.service - The Apache HTTP Server
     Loaded: loaded (/lib/systemd/system/apache2.service; enabled; vendor preset: enabled)
     Active: active (running) since Fri 2022-06-17 15:04:27 UTC; 4s ago
       Docs: https://httpd.apache.org/docs/2.4/
    Process: 16746 ExecStart=/usr/sbin/apachectl start (code=exited, status=0/SUCCESS)
   Main PID: 16750 (apache2)
      Tasks: 6 (limit: 2292)
     Memory: 14.7M
        CPU: 98ms
     CGroup: /system.slice/apache2.service
             ??16750 /usr/sbin/apache2 -k start
             ??16751 /usr/sbin/apache2 -k start
             ??16752 /usr/sbin/apache2 -k start
             ??16753 /usr/sbin/apache2 -k start
             ??16754 /usr/sbin/apache2 -k start
             ??16755 /usr/sbin/apache2 -k start

Jun 17 15:04:27 ubuntu2204 systemd[1]: Starting The Apache HTTP Server...
```
## LetsEncrpt DNS SSL Certificate ##
```
apt-get install python3-certbot-apache -y
```
```
certbot --apache -d next.example.com
```
** Provide an email and accept terms **
```
Saving debug log to /var/log/letsencrypt/letsencrypt.log
Plugins selected: Authenticator standalone, Installer None
Enter email address (used for urgent renewal and security notices) (Enter 'c' to
cancel): hitjethva@gmail.com

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Please read the Terms of Service at
https://letsencrypt.org/documents/LE-SA-v1.2-November-15-2017.pdf. You must
agree in order to register with the ACME server at
https://acme-v02.api.letsencrypt.org/directory
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
(A)gree/(C)ancel: A

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Would you be willing to share your email address with the Electronic Frontier
Foundation, a founding partner of the Let's Encrypt project and the non-profit
organization that develops Certbot? We'd like to send you email about our work
encrypting the web, EFF news, campaigns, and ways to support digital freedom.
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
(Y)es/(N)o: Y
Plugins selected: Authenticator apache, Installer apache
Obtaining a new certificate
Performing the following challenges:
http-01 challenge for next.example.com
Enabled Apache rewrite module
Waiting for verification...
Cleaning up challenges
Created an SSL vhost at /etc/apache2/sites-available/next-le-ssl.conf
Enabled Apache socache_shmcb module
Enabled Apache ssl module
Deploying Certificate to VirtualHost /etc/apache2/sites-available/next-le-ssl.conf
Enabling available site: /etc/apache2/sites-available/next-le-ssl.conf
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
