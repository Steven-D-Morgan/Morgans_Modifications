# Media Player Remote #
I began using Home Assistant because I hated having several different apps to control all of our devices. This is my attempt to combine several different devices into 1 combined & simple remote.
- Roku
- LG Smart TV
- Onkyo TX-NR686 Receiver
***
### Configuration.yaml ###
- Add the following line..
```
shell_command: !include YAML/ShellCommands.yaml
```
***
### ShellCommands.yaml *(Roku Specific)* ###
- Create a file in your YAML directory and paste the below cheat sheet.
- Alter the below IP to mimic your network infrastructure. Definetely recommend Static IP assignments at the Router level.
```
living_room_roku_on: "curl -X POST http://192.168.10.154:8060/keypress/PowerOn"
living_room_roku_off: "curl -X POST http://192.168.10.154:8060/keypress/PowerOff"
living_room_roku_volume_up: "curl -X POST http://192.168.10.154:8060/keypress/VolumeUp"
living_room_roku_volume_down: "curl -X POST http://192.168.10.154:8060/keypress/VolumeDown"
living_room_roku_home: "curl -X POST http://192.168.10.154:8060/keypress/Home"
living_room_roku_play: "curl -X POST http://192.168.10.154:8060/keypress/Play"
living_room_roku_reverse: "curl -X POST http://192.168.10.154:8060/keypress/Rev"
living_room_roku_forward: "curl -X POST http://192.168.10.154:8060/keypress/Fwd"
living_room_roku_select: "curl -X POST http://192.168.10.154:8060/keypress/Select"
living_room_roku_left: "curl -X POST http://192.168.10.154:8060/keypress/Left"
living_room_roku_right: "curl -X POST http://192.168.10.154:8060/keypress/Right"
living_room_roku_down: "curl -X POST http://192.168.10.154:8060/keypress/Down"
living_room_roku_volume_mute: "curl -X POST http://192.168.10.154:8060/keypress/VolumeMute"
living_room_roku_up: "curl -X POST http://192.168.10.154:8060/keypress/Up"
living_room_roku_back: "curl -X POST http://192.168.10.154:8060/keypress/Back"
living_room_roku_info: "curl -X POST http://192.168.10.154:8060/keypress/Info"
living_room_roku_plex: "curl -X POST http://192.168.10.154:8060/launch/13535"
living_room_roku_youtube: "curl -X POST http://192.168.10.154:8060/launch/837"
living_room_roku_netflix: "curl -X POST http://192.168.10.154:8060/launch/12"
living_room_roku_prime: "curl -X POST http://192.168.10.154:8060/launch/13"
living_room_roku_hulu: "curl -X POST http://192.168.10.154:8060/launch/2285"
living_room_roku_disney: "curl -X POST http://192.168.10.154:8060/launch/291097"
```
***
