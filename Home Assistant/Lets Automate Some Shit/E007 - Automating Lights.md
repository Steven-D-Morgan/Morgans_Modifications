# Lets Automate Some Shit - Episode 007
- [YouTube](https://youtu.be/x46OsoH3TlY)
- [Aeotek Multisensor 7](https://a.co/d/6V9IPDd)
- [Aeotek Recessed Mount](https://a.co/d/6nRN7Rr)
- [GE ZW4008 Switch](https://a.co/d/5Yiq4n8)
___
 
In this episode, we discuss 3 useful lighting automations.

**Indoor Motion Lighting**
---
```
alias: Kitchen Auto Lighting
description: ""
trigger:
  - type: motion
    platform: device
    device_id: b9b3ac444006dc0b34e50e0b7d6113f0
    entity_id: 15dbf25930872f14ab7d0b9a7b4d4289
    domain: binary_sensor
    alias: Motion
    id: Motion
  - type: no_motion
    platform: device
    device_id: b9b3ac444006dc0b34e50e0b7d6113f0
    entity_id: 15dbf25930872f14ab7d0b9a7b4d4289
    domain: binary_sensor
    for:
      hours: 0
      minutes: 2
      seconds: 0
    id: NoMotion_2M
    alias: NoMotion_2M
  - type: no_motion
    platform: device
    device_id: b9b3ac444006dc0b34e50e0b7d6113f0
    entity_id: 15dbf25930872f14ab7d0b9a7b4d4289
    domain: binary_sensor
    for:
      hours: 0
      minutes: 5
      seconds: 0
    id: NoMotion_5M
    alias: NoMotion_5M
condition: []
action:
  - choose:
      - conditions:
          - condition: time
            after: "20:00:00"
            before: "23:00:00"
        sequence:
          - choose:
              - conditions:
                  - condition: trigger
                    id:
                      - Motion
                  - condition: not
                    conditions:
                      - condition: device
                        device_id: b21ff549e71a0e475d7fa97fb97184fc
                        domain: media_player
                        entity_id: 12f6f8570f620bf001e8bc870f4c6fa8
                        type: is_playing
                sequence:
                  - service: light.turn_on
                    data: {}
                    target:
                      entity_id: light.kitchen_sink
              - conditions:
                  - condition: trigger
                    id:
                      - NoMotion_2M
                  - condition: device
                    type: is_on
                    device_id: 35154a70cda3e9c0568a65de2043783c
                    entity_id: 94d2ca9f344219bf91419fb85cd555ec
                    domain: light
                sequence:
                  - service: light.turn_off
                    data: {}
                    target:
                      entity_id: light.kitchen_sink
      - conditions:
          - condition: time
            after: "23:00:00"
            before: "07:00:00"
        sequence:
          - choose:
              - conditions:
                  - condition: trigger
                    id:
                      - Motion
                sequence:
                  - service: light.turn_on
                    data: {}
                    target:
                      entity_id: light.kitchen_sink
              - conditions:
                  - condition: trigger
                    id:
                      - NoMotion_2M
                sequence:
                  - service: light.turn_off
                    data: {}
                    target:
                      entity_id: light.kitchen_sink
      - conditions:
          - condition: time
            after: "07:00:00"
            before: "20:00:00"
        sequence:
          - choose:
              - conditions:
                  - condition: trigger
                    id:
                      - Motion
                sequence:
                  - service: light.turn_on
                    data: {}
                    target:
                      entity_id: light.kitchen_sink
              - conditions:
                  - condition: trigger
                    id:
                      - NoMotion_5M
                sequence:
                  - service: light.turn_off
                    data: {}
                    target:
                      entity_id: light.kitchen_sink
mode: single
```
___
**Outdoor Dumb Motion Lights**
---

```
CODE SNIPPET HERE
```
___
**Media Player Pause/Play Lighting**
---

```
CODE SNIPPET HERE
```
