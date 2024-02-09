AdGuard DNS
If you want to block ads and trackers.
dns.adguard.com
Non-filtering server
If you don't want AdGuard DNS to block ads and trackers, or any other DNS requests.
dns-unfiltered.adguard.com
Family protection server
If you want to block adult content, enable safe search and safe mode options wherever possible, and also block ads and trackers.
dns-family.adguard.com
| Provider | Description | IPv4 | IPv6 | DNS over TLS | Notes |
| ----------- | ----------- | ----------- | ----------- | ----------- | ----------- |
| [AdGuard](https://adguard-dns.io/en/public-dns.html) | Default: Blocks Ads & Trackers | 94.140.14.14 <br><br> 94.140.15.15 | 2a10:50c0::ad1:ff <br><br> 2a10:50c0::ad2:ff | dns.adguard.com | |
| [AdGuard](https://adguard-dns.io/en/public-dns.html) | Standard DNS (Non-Filtered) | 94.140.14.140 <br><br> 94.140.14.141 | 2a10:50c0::1:ff <br><br> 2a10:50c0::2:ff | dns-unfiltered.adguard.com| |
| [AdGuard](https://adguard-dns.io/en/public-dns.html) | Family Filter: Safe Search Enabled, Block Adult Content, Block Ads, Block Trackers | 94.140.14.15 <br><br> 94.140.15.16 | 2a10:50c0::bad1:ff <br><br> 2a10:50c0::bad2:ff | dns-family.adguard.com | |
| [Cloudflare](https://developers.cloudflare.com/1.1.1.1/setup/router/) | Standard DNS (Non-Filtered) | 1.1.1.1 <br><br> 1.0.0.1 | 2606:4700:4700::1111 <br><br> 2606:4700:4700::1001 | 1dot1dot1dot1.cloudflare-dns.com <br><br> one.one.one.one | |
| [OpenDNS](https://www.opendns.com/) | Standard DNS (Non-Filtered) | 208.67.222.222 <br><br> 208.67.220.220 | N/A | N/A | Logs DNS traffic it receives |
| [Google](https://developers.google.com/speed/public-dns/docs/using) | Standard DNS | 8.8.8.8 <br><br> 8.8.4.4 | 2001:4860:4860::8888 <br><br> 2001:4860:4860::8844 | dns.google | Logs user's browsing history |
| [Quad 9](https://www.quad9.net/service/service-addresses-and-features) | Secured: Malware Blocking & DNSSEC Validation | 9.9.9.9 <br><br> 149.112.112.112 | 2620:fe::fe <br><br> 2620:fe::9 | dns.quad9.net |  |
| [Quad 9](https://www.quad9.net/service/service-addresses-and-features) | Secured: Malware Blocking & DNSSEC Validation + [ECS Enabled](https://www.quad9.net/support/faq#edns) | 9.9.9.11 <br><br> 149.112.112.11 | 2620:fe::11 <br><br> 2620:fe::fe:11| dns11.quad9.net |  |
| [Quad 9](https://www.quad9.net/service/service-addresses-and-features) | Unsecured: Standard DNS (Non-Filtered) | 9.9.9.10 <br><br> 149.112.112.10 | 2620:fe::10 <br><br> 2620:fe::fe:10 | dns10.quad9.net |  |

***
## pfSense
[Stop DNS Leakage in pfSense](http://blog.zencoffee.org/2018/04/stopping-dns-leakage-with-pfsense/)
# DNS Resolver Additional Config
```
server:
forward-zone:
name: "."
forward-ssl-upstream: yes
forward-addr: 1.1.1.1@853
forward-addr: 1.0.0.1@853
```
