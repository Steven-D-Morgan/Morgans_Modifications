# Alexa Custom Component
- [YouTube]()
- [Alexa Media Player](https://github.com/custom-components/alexa_media_player)
___
**TEMPLATE SENSORS**

```
###########################################
###########################################
###########################################
######## WashingMachineStatus.yaml ########
###########################################
- platform: template
  sensors:
    ########################################
    washing_machine_status:
      friendly_name: "Washer"
      icon_template: >-
        {% if is_state('binary_sensor.washing_machine_status', 'on') %}
          mdi:washing-machine
        {% else %}
          mdi:washing-machine-off
        {% endif %}
      delay_off:
        seconds: 15
      value_template: >-
        {{ states('sensor.washing_machine_watts') | float(0) > 4 }}

    ########################################
    dryer_status:
      friendly_name: "Dryer"
      icon_template: >-
        {% if is_state('binary_sensor.dryer_status', 'on') %}
          mdi:tumble-dryer
        {% else %}
          mdi:tumble-dryer-off
        {% endif %}
      delay_off:
#        seconds: 480
        minutes: 7
      value_template: >-
        {{ states('sensor.breaker_06_08_1minute_watts') | float(0) > 5 }}
```

___
**AUTOMATION ACTIONS**

```
service: media_player.volume_set
data:
  volume_level: 0.4
target:
  entity_id: media_player.kitchen_echo
alias: "Volume: Kitchen Echo"
```

```
service: notify.alexa_media
data:
  target:
    - media_player.kitchen_echo
  data:
    type: tts
  message: >-
    {{ ["Human, go unload the dryer", "Your clothes have finished drying", "Time to go empty the Dryer"] | random }}
alias: "Alexa: Kitchen Echo"
```
