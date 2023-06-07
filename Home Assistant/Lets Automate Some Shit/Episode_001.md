# Lets Automate Some Shit - Episode 001
- [YouTube]()

___
- In this video/tutorial I begin a series in which I hope to grow my subscription base/following. I will do one automation per episode; with some being simple like motion lighting to complex is my breaker tripped or is utility power out? 
- Well... To start with a semi bang? We are doing the utilty vs. breaker automation in this first video.
- The YAML below is the one I go over in the linked video. Seems short and sweet? That is the goal, to open your imagination and get you thinking on how you could do something similar. We could add on to this thing forever. 
```
alias: (SYSTEM) Power Loss
description: ""
trigger:
  - platform: template
    value_template: >-
      {{ is_state('binary_sensor.dog_house_hs110', 'off') and
      is_state('binary_sensor.washing_machine_hs110', 'off') }}
    id: WashingMachine&DogHouseNoPing
    alias: WashingMachine&DogHouseNoPing
  - platform: numeric_state
    entity_id: sensor.cyberpower1500_01_input_voltage
    below: 50
    id: UPS01_Below50v
    alias: UPS01_Below50v
condition: []
action:
  - choose:
      - conditions:
          - condition: trigger
            id: WashingMachine&DogHouseNoPing
          - condition: numeric_state
            entity_id: sensor.cyberpower1500_01_input_voltage
            below: 50
        sequence:
          - service: notify.mobile_app_sdm_ios
            data:
              title: UTILITY POWER LOSS
              message: Has been detected
      - conditions:
          - condition: trigger
            id: UPS01_Below50v
          - condition: template
            value_template: >-
              {{ is_state('binary_sensor.dog_house_hs110', 'on') and
              is_state('binary_sensor.washing_machine_hs110', 'on') }}
        sequence:
          - service: notify.mobile_app_sdm_ios
            data:
              title: Circuit Breaker TRIPPED
              message: CHECK Breaker 21
mode: single

```
