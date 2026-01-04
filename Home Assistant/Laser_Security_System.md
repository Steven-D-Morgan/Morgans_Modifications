# Laser Based Home Security System
- [Tasmota](https://tasmota.github.io/docs/Download/)
- [Windows Tasmotizer](https://github.com/tasmota/tasmotizer/releases)
### Switch as Binary Sensor in Home Assistant
```
SetOption114 1
```
### DEFAULT Tasmota Settings I use
- SetOption8 1: Fahrenheit
- SetOption19 0: Tasmota Discovery Protocol
- SetOption26 1: Use POWER1 even if only 1 relay
- SetOption36 0: Disable Boot Loop Control
- SetOption53 1: Display Hostname & IP in WebGUI
```
SetOption19 0; SetOption114 1; SetOption8 1; SetOption26 1; SetOption36 0; SetOption53 1; Timezone -5; NtpServer1 192.168.10.254; NtpServer2 192.168.20.254; NtpServer3 192.168.10.254
```
