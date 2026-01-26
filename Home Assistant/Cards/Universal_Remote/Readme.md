# Build Your Own Digital Universal Remote
- This is the template code I use where the positioning work has already been completed for you.
- [Here](https://github.com/Steven-D-Morgan/Morgans_Modifications/tree/main/Home%20Assistant/Universal_Remote/Remote%20Icons) are some logos to help you get started.
- We will be using the built in [Picture Elements Card](https://www.home-assistant.io/dashboards/picture-elements/)
- Home Assistant Documentation for their built in [LG webOS](https://www.home-assistant.io/integrations/webostv/) integration.
- [Removal.ai](https://removal.ai/) is a great online tool to remove backgrounds from images/logos.
```
type: picture-elements
elements:
  - type: service-button
    style:
      top: 11%
      left: 12.2%
    service: shell_command.living_room_roku_netflix
  - type: service-button
    style:
      top: 29%
      left: 12.2%
    service: shell_command.living_room_roku_plex
  - type: service-button
    style:
      top: 47%
      left: 12.81%
    service: shell_command.living_room_roku_youtube
  - type: service-button
    style:
      top: 65%
      left: 12.9%
    service: shell_command.living_room_roku_hulu
  - type: service-button
    style:
      top: 85%
      left: 13.05%
    service: shell_command.living_room_roku_disney
  - type: service-button
    style:
      top: 24.3%
      left: 36.4%
    service: shell_command.living_room_roku_back
  - type: service-button
    style:
      top: 52.1%
      left: 36.9%
    service: shell_command.living_room_roku_left
  - type: service-button
    style:
      top: 79.4%
      left: 36.9%
    service: shell_command.living_room_roku_reverse
  - type: service-button
    style:
      top: 93.1%
      left: 36.9%
    service: script.living_room_tv_mute
  - type: service-button
    style:
      top: 10.6%
      left: 63%
    service: shell_command.living_room_roku_off
  - type: service-button
    style:
      top: 24.4%
      left: 62.5%
    service: shell_command.living_room_roku_info
  - type: service-button
    style:
      top: 38.4%
      left: 62.5%
    service: shell_command.living_room_roku_up
  - type: service-button
    style:
      top: 51.8%
      left: 63.2%
    service: shell_command.living_room_roku_select
  - type: service-button
    style:
      top: 65.8%
      left: 63.2%
    service: shell_command.living_room_roku_down
  - type: service-button
    style:
      top: 79.1%
      left: 63.2%
    service: script.living_room_roku_playpause
  - type: service-button
    style:
      top: 93.1%
      left: 63.2%
    service: script.living_room_onkyo_volume_down
  - type: service-button
    style:
      top: 24.19%
      left: 89.5%
    service: shell_command.living_room_roku_home
  - type: service-button
    style:
      top: 52.1%
      left: 89.5%
    service: shell_command.living_room_roku_right
  - type: service-button
    style:
      top: 79.4%
      left: 89.5%
    service: shell_command.living_room_roku_forward
  - type: service-button
    style:
      top: 93.1%
      left: 89.5%
    service: shell_command.living_room_roku_forward
  - type: service-button
    style:
      top: 93.1%
      left: 89.5%
    service: script.living_room_onkyo_volume_up
image: /local/Media/TV/_SDM_Remote.png

```
- Roku Shell Commands

```
###########################################
###########################################
###########################################
########### shell_commands.yaml ###########
###########################################
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

