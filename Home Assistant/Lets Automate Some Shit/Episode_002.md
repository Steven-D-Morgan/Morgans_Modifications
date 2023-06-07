# Lets Automate Some Shit - Episode 002
- [YouTube](https://youtu.be/iAMhhPdIRdQ)

___
- In this episode, we go over Alexa Media Player notifications, sounds, etc.
- In a previous video I go over how to install this 3rd party component, [here](https://github.com/Steven-D-Morgan/Morgans_Modifications/blob/main/Home%20Assistant/CustomComponents_Alexa.md) is that info.
- The YAML below is related to the associated video linked at the top. The goal is to give everyone a basic understanding on what is possible to get you started, many of these could be added onto indefinetely. 
```
alias: LetsAutomateSomeShit_E0002
description: ""
trigger:
  - platform: state
    entity_id:
      - binary_sensor.front_doorbell
    from: "off"
    to: "on"
    id: Doorbell
    alias: Doorbell
condition: []
action:
  - service: media_player.play_media
    data:
      media_content_id: amzn_sfx_doorbell_chime_01
      media_content_type: sound
    target:
      entity_id: media_player.office_echo_show
  - delay:
      hours: 0
      minutes: 0
      seconds: 2
      milliseconds: 0
  - service: notify.alexa_media
    data:
      message: Someone is definitely at the door
      data:
        type: tts
      target: media_player.office_echo_show
mode: single

```

___
*Additional Information & Resources*
- [Amazon Sound Libary](https://developer.amazon.com/en-US/docs/alexa/custom-skills/ask-soundlibrary.html)
- [Alexa Media Player Component](https://github.com/custom-components/alexa_media_player)
