  GNU nano 6.2                                                                                      /var/www/html/nextcloud/config/config.php *
<?php
$CONFIG = array (
  'instanceid' => 'INSTANCEID',
  'passwordsalt' => 'PASSWORDSALT',
  'secret' => 'SECRET',
  'trusted_domains' =>
  array (
    0 => 'https://mynextcloudhostname.com',
  ),
  'datadirectory' => '/var/www/html/nextcloud/data',
  'dbtype' => 'mysql',
  'version' => '26.0.1.1',
  'overwrite.cli.url' => 'https://mynextcloudhostname.com',
  'dbname' => 'nextcloud',
  'dbhost' => 'localhost',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'db_USERNAME',
  'dbpassword' => 'PASSWORDD',
  'installed' => true,
  'memories.exiftool' => '/var/www/html/nextcloud/apps/memories/exiftool-bin/exiftool-amd64-glibc',
  'memories.vod.path' => '/var/www/html/nextcloud/apps/memories/exiftool-bin/go-vod-amd64',
  'maintenance' => false,
  /**
  * All options below this line are not included by default
  */
  'default_language' => 'en',
  'default_locale' => 'en_US',
  'default_phone_region' => 'US',
  'allow_user_to_change_display_name' => false,
  'session_keepalive' => true,
  'auto_logout' => false,
  'auth.bruteforce.protection.enabled' => true,
  'ratelimit.protection.enabled' => true,
  'updatechecker' => true,
  'updater.release.channel' => 'stable',
  'logtimezone' => 'America/New_York',
);
