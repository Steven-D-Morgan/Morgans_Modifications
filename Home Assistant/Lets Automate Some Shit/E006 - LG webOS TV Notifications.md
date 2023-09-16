# Lets Automate Some Shit - Episode 006
- [YouTube]()
- [Home Assistant: LG webOS](https://www.home-assistant.io/integrations/webostv/)
- [Home Assistant: Templating](https://www.home-assistant.io/docs/automation/templating/)
___

- In this video, we go over sending a simple message via the notify service to your LG webOS Television. Even added in an Alexa TTS command to go along with it!

- The YAML below is the code used in the linked video.


```
alias: (GPS) Notify When Home
description: ""
trigger:
  - platform: zone
    entity_id: person.steven_morgan
    zone: zone.home
    event: enter
condition: []
action:
  - service: media_player.volume_set
    data:
      volume_level: 0.6
    target:
      entity_id: media_player.kitchen_echo
  - service: notify.alexa_media
    data:
      data:
        type: tts
      target:
        - media_player.kitchen_echo
      message: Steven has arrived at home
  - service: notify.living_room_tv
    data:
      message: Steven has arrived at home
  - service: media_player.volume_set
    data:
      volume_level: 0.5
    target:
      entity_id: media_player.kitchen_echo
mode: single

```
