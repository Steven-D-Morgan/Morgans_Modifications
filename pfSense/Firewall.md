# pfSense - Locking Down your Firewall

**[YouTube](https://youtu.be/fp8edzQUDU4):** Locking Down your Network - Part 1
___

## Ports_Internal
*Internal LAN to LAN Ports*
- 53 : DNS 
- 5353:5354 : MDNS 1
- 23 : NTP 
- 21 : FTP
- 22 : SSH
- 161 : SNMP
- 80 : HTTP
- 443 : HTTPS
- 515 : LPD (Printer)
- 427 : SLP (Printer scanner)
- 631 : IPP (Printer)
- 10001 : UBNT Broadcast
- 5001 : iperf
- 5900 : IPMI
- 9000 : VNC
- 3389 : RDP (Remote Desktop)
- 49152:65535 : Ephemeral
- 8080:8081 : Unifi
 
- 8880 : Unifi redirect HTTP
- 8843 : Unifi redirect HTTPS


---
## Ports_External
*External LAN to WAN Ports*
- 21 : FTP
- 22 : SSH
- 80 : HTTP
- 443 : HTTPS
- 587 : SMTPS
- 993 : IMAPS
- 5222 : XMPP
- 8080 : HTTP Alternate
- 465 : SMTPS
- 119 : NNTP
- 143 : IMAP
- 1194 : VPN
- 1900 : NordVPN
- 6667 : IRC
- 6697 : IRCS
- 8443 : CalDAV
- 8843 : CardDAV
- 49152:65535 : Ephemeral
