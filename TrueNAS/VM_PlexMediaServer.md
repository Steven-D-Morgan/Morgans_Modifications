# TrueNAS Scale - Ubuntu Virtual Machine - Nextcloud with SSL Encryption
Documentation related to my [YouTube Video]([https://www.youtube.com/@morgansmodifications])
___
- 1.) **Download [Ubuntu Server](https://ubuntu.com/download/server)**
 - 2.) **Create a New VM & Upload iso downloaded above**
 - 3.) **Do your standard updating**
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
 - 4.) **Copy the following commands**
```
echo deb https://downloads.plex.tv/repo/deb public main | sudo tee /etc/apt/sources.list.d/plexmediaserver.list
```
```
echo deb https://downloads.plex.tv/repo/deb public main | sudo tee /etc/apt/sources.list.d/plexmediaserver.list
```
```
sudo apt update
```
```
sudo apt install plexmediaserver
```
 - 5.) **Confirm Plex is Running**
```
sudo systemctl status plexmediaserver
```
 - 6.) **Adjust the Firewall**
```
sudo nano /etc/ufw/applications.d/plexmediaserver
```
```
[plexmediaserver]
title=Plex Media Server (Standard)
description=The Plex Media Server
ports=32400/tcp|3005/tcp|5353/udp|8324/tcp|32410:32414/udp

[plexmediaserver-dlna]
title=Plex Media Server (DLNA)
description=The Plex Media Server (additional DLNA capability only)
ports=1900/udp|32469/tcp

[plexmediaserver-all]
title=Plex Media Server (Standard + DLNA)
description=The Plex Media Server (with additional DLNA capability)
ports=32400/tcp|3005/tcp|5353/udp|8324/tcp|32410:32414/udp|1900/udp|32469/tcp
```
```
sudo ufw app update plexmediaserver
```
```
sudo ufw allow plexmediaserver-all
```
```
sudo ufw status verbose
```
```
sudo mkdir -p /opt/plexmedia/{movies,tv,home_videos,home_photos}
```
```
sudo chown -R plex: /opt/plexmedia
```
