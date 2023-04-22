 - 1.) **Go to [NordVPN Server Selector Tool](https://nordvpn.com/servers/tools/)**
   - A.) Select Type "P2P, Double VPN, etc"
   - B.) Select "Show Available Protocols"
   - C.) Download the appropriate config file.
      - NOTE: This is where the certificates will be located that we will use later.
 - 2.) **Open the configuration file in your favorite text editor**
    - [Notepad++](https://notepad-plus-plus.org/)
    - [Visual Studio Code](https://code.visualstudio.com/download)
    - Notepad
 - 3.) **Open your web browser and go to your pfSense WebGUI**
 - 4.) **Select the "System" dropdown, then "Cert Manager".**
 - 5.) **Under the "CA Certificates" section, select "New +"**
 - 6.) **Under Method, change to "Import An Existing Certificate Authority"**
 - 7.) **Go to your text editor and copy everything in between the "<CA>" & "</CA>" tags.**
```
  -----BEGIN CERTIFICATE-----
  MIIFCjCCAvKgAwIBAgIBATANBgkqhkiG9w0BAQ0FADA5MQswCQYDVQQGEwJQQTEQ
  MA4GA1UEChMHTm9yZFZQTjEYMBYGA1UEAxMPTm9yZFZQTiBSb290IENBMB4XDTE2
  MDEwMTAwMDAwMFoXDTM1MTIzMTIzNTk1OVowOTELMAkGA1UEBhMCUEExEDAOBgNV
  BAoTB05vcmRWUE4xGDAWBgNVBAMTD05vcmRWUE4gUm9vdCBDQTCCAiIwDQYJKoZI
  hvcNAQEBBQADggIPADCCAgoCggIBAMkr/BYhyo0F2upsIMXwC6QvkZps3NN2/eQF
  kfQIS1gql0aejsKsEnmY0Kaon8uZCTXPsRH1gQNgg5D2gixdd1mJUvV3dE3y9FJr
  XMoDkXdCGBodvKJyU6lcfEVF6/UxHcbBguZK9UtRHS9eJYm3rpL/5huQMCppX7kU
  eQ8dpCwd3iKITqwd1ZudDqsWaU0vqzC2H55IyaZ/5/TnCk31Q1UP6BksbbuRcwOV
  skEDsm6YoWDnn/IIzGOYnFJRzQH5jTz3j1QBvRIuQuBuvUkfhx1FEwhwZigrcxXu
  MP+QgM54kezgziJUaZcOM2zF3lvrwMvXDMfNeIoJABv9ljw969xQ8czQCU5lMVmA
  37ltv5Ec9U5hZuwk/9QO1Z+d/r6Jx0mlurS8gnCAKJgwa3kyZw6e4FZ8mYL4vpRR
  hPdvRTWCMJkeB4yBHyhxUmTRgJHm6YR3D6hcFAc9cQcTEl/I60tMdz33G6m0O42s
  Qt/+AR3YCY/RusWVBJB/qNS94EtNtj8iaebCQW1jHAhvGmFILVR9lzD0EzWKHkvy
  WEjmUVRgCDd6Ne3eFRNS73gdv/C3l5boYySeu4exkEYVxVRn8DhCxs0MnkMHWFK6
  MyzXCCn+JnWFDYPfDKHvpff/kLDobtPBf+Lbch5wQy9quY27xaj0XwLyjOltpiST
  LWae/Q4vAgMBAAGjHTAbMAwGA1UdEwQFMAMBAf8wCwYDVR0PBAQDAgEGMA0GCSqG
  SIb3DQEBDQUAA4ICAQC9fUL2sZPxIN2mD32VeNySTgZlCEdVmlq471o/bDMP4B8g
  nQesFRtXY2ZCjs50Jm73B2LViL9qlREmI6vE5IC8IsRBJSV4ce1WYxyXro5rmVg/
  k6a10rlsbK/eg//GHoJxDdXDOokLUSnxt7gk3QKpX6eCdh67p0PuWm/7WUJQxH2S
  DxsT9vB/iZriTIEe/ILoOQF0Aqp7AgNCcLcLAmbxXQkXYCCSB35Vp06u+eTWjG0/
  pyS5V14stGtw+fA0DJp5ZJV4eqJ5LqxMlYvEZ/qKTEdoCeaXv2QEmN6dVqjDoTAo
  k0t5u4YRXzEVCfXAC3ocplNdtCA72wjFJcSbfif4BSC8bDACTXtnPC7nD0VndZLp
  +RiNLeiENhk0oTC+UVdSc+n2nJOzkCK0vYu0Ads4JGIB7g8IB3z2t9ICmsWrgnhd
  NdcOe15BincrGA8avQ1cWXsfIKEjbrnEuEk9b5jel6NfHtPKoHc9mDpRdNPISeVa
  wDBM1mJChneHt59Nh8Gah74+TM1jBsw4fhJPvoc7Atcg740JErb904mZfkIEmojC
  VPhBHVQ9LHBAdM8qFI2kRK0IynOmAZhexlP/aT/kpEsEPyaZQlnBn3An1CRz8h0S
  PApL8PytggYKeQmRhl499+6jLxcZ2IegLfqq41dzIjwHwTMplg+1pKIOVojpWA==
  -----END CERTIFICATE-----
```
 - 8.) **Paste into the "Certificate Date" block.**
 - 9.) **Select the "VPN" tab at the top of the page.**
      - A.) Select OpenVPN
      - B.) Clients
      - C.) Add Client
 - 10.) **Fill in the fields as listed below.**
    - Disable this client: Uncheck
    - Server mode: Peer to Peer (SSL/TLS)
    - Protocol: UDP on IPv4 only (you can also use TCP)
    - Device mode: tun – Layer 3 Tunnel Mode
    - Interface: WAN
    - Local port: Leave blank
    - Server host or address: the hostname of the server recommended to you (in our case, it’s de855.nordvpn.com);
    - Server port: 1194 (use 443 if you use TCP)
    - Proxy host or address: Leave blank
    - Proxy port: Leave blank
    - Proxy Authentication: none
    - Description: Any name you want can go here for admistrative purposes. 
 - 11.) **Additional Config Options**
```
tls-client;
remote-random;
tun-mtu 1500;
tun-mtu-extra 32;
mssfix 1450;
persist-key;
persist-tun;
reneg-sec 0;
remote-cert-tls server;
```
