# Lets Automate Some Shit - Episode 005
- [YouTube](https://youtu.be/wS-H5lCL8Z0)

___
- Get notified when your clothes have finished washing or drying. Notify your phone, get Alexa to inform you? Sky is the limit, hope this video assists in showing you how.
- The YAML below is related to the associated video linked at the top. The goal is to give everyone a basic understanding on what is possible to get you started, many of these could be added onto indefinetely. 
```
- platform: template
  sensors:
    ###########################################
    washing_machine_status:
      friendly_name: "Washer"
      icon_template: >-
        {% if is_state('binary_sensor.washing_machine_status', 'on') %}
          mdi:washing-machine
        {% else %}
          mdi:washing-machine-off
        {% endif %}
      delay_off:
        seconds: 60
      value_template: >-
        {{ states('sensor.washing_machine_watts') | float(0) > 10 }}

    ###########################################
    dryer_status:
      friendly_name: "Dryer"
      icon_template: >-
        {% if is_state('binary_sensor.dryer_status', 'on') %}
          mdi:tumble-dryer
        {% else %}
          mdi:tumble-dryer-off
        {% endif %}
      delay_off:
        seconds: 60
      #   delay_on:
      #        minutes: 1
      value_template: >-
        {{ states('sensor.breaker_06_08_1minute_watts') | float(0) > 100 }}

```

```
alias: Clothes Washer
description: ""
trigger:
  - from: "on"
    platform: state
    to: "off"
    entity_id: binary_sensor.washing_machine_status
condition: []
action:
  - service: media_player.volume_set
    data:
      volume_level: 0.4
    target:
      entity_id: media_player.kitchen_echo
    alias: "Volume: Kitchen Echo"
  - service: notify.alexa_media
    data:
      target:
        - media_player.kitchen_echo
      data:
        type: tts
      message: >-
        {{ ["Human, go empty the washing machine", "Your clothes have finished
        washing",
            "Washing machine cycle complete", "Time to go empty the washer"] | random }}
    alias: "Notify: Amazon Alexa"
  - service: notify.mobile_app_sdm_ios
    data:
      title: Washing Machine
      message: Ready to be emptied!
    alias: "Notify: Steven"
mode: single

```

```
alias: Clothes Dryer
description: ""
trigger:
  - platform: numeric_state
    entity_id: sensor.breaker_06_08_1minute_watts
    for:
      hours: 0
      minutes: 1
      seconds: 0
    above: 20
    alias: Breaker 06/08 Watts ABOVE 20
condition: []
action:
  - service: media_player.volume_set
    data:
      volume_level: 0.4
    target:
      entity_id: media_player.kitchen_echo
    alias: "Volume: Kitchen Echo"
  - service: notify.alexa_media
    data:
      target:
        - media_player.kitchen_echo
      data:
        type: tts
      message: >-
        {{ ["Human, go unload the dryer", "Your clothes have finished drying",
        "Time to go empty the Dryer"] | random }}
    alias: "Alexa: Kitchen Echo"
  - service: notify.mobile_app_sdm_ios
    data:
      title: Dryer
      message: Ready to be emptied!
    alias: "Notify: Steven"
mode: single
max_exceeded: silent

```
