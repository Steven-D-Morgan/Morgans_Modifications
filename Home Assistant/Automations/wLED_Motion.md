# wLED Motion Based Automations
[YouTube]()
___
Here is a realistic wLED use case automation in your smart home.

```
alias: Motion Detection
description: ""
trigger:
  - type: motion
    platform: device
    device_id: cf2fcba97929490b5e16a83330cb2d1f
    entity_id: binary_sensor.abels_bed_motion
    domain: binary_sensor
    id: Crib_MotionDetected
    alias: Abel's Crib
  - type: motion
    platform: device
    device_id: 87fff114bbc77c9eebe8be918c04eebe
    entity_id: binary_sensor.garage_exterior_motion
    domain: binary_sensor
    id: GarageExterior_MotionDetected
    alias: Exterior Garage
  - type: motion
    platform: device
    device_id: acb8545d99754a144e3d2ab672f42144
    entity_id: binary_sensor.gun_safe_motion
    domain: binary_sensor
    id: GunSafe_MotionDetected
    alias: Gun Safe
condition: []
action:
  - choose:
      - conditions:
          - condition: trigger
            id: Crib_MotionDetected
        sequence:
          - service: media_player.volume_set
            data:
              volume_level: 0.4
            target:
              entity_id:
                - media_player.master_bedroom_echo_dot
                - media_player.office_echo_show
            alias: "Volume: Master Bedroom Echo Dot & Office Echo Show"
          - device_id: aeb5ad7a21ebaf5a663ac7291007dd63
            domain: select
            entity_id: select.master_bedroom_tv_preset
            type: select_option
            option: "[50] Crib Motion"
            alias: "wLED: MBR TV Preset"
          - service: notify.alexa_media
            data:
              target:
                - media_player.master_bedroom_echo_dot
                - media_player.office_echo_show
              data:
                type: tts
              message: >-
                {{ ["Abel is moving around in his crib", "Baby Shark may be
                awake",
                 "Check on baby shark, he is moving around"] | random }}
          - delay:
              hours: 0
              minutes: 0
              seconds: 30
              milliseconds: 0
            alias: "Delay: 30s"
          - type: turn_off
            device_id: aeb5ad7a21ebaf5a663ac7291007dd63
            entity_id: light.master_bedroom_tv
            domain: light
            alias: "wLED: Turn off MBR"
      - conditions:
          - condition: trigger
            id: GarageExterior_MotionDetected
        sequence:
          - device_id: aeb5ad7a21ebaf5a663ac7291007dd63
            domain: select
            entity_id: select.master_bedroom_tv_preset
            type: select_option
            option: "[04] ALARM"
          - delay:
              hours: 0
              minutes: 0
              seconds: 30
              milliseconds: 0
          - type: turn_off
            device_id: aeb5ad7a21ebaf5a663ac7291007dd63
            entity_id: light.master_bedroom_tv
            domain: light
          - type: turn_on
            device_id: 23f5ae168e1a55bbb4bd89455c279f4b
            entity_id: light.garage_exterior
            domain: light
          - delay:
              hours: 0
              minutes: 4
              seconds: 0
              milliseconds: 0
          - type: turn_off
            device_id: 23f5ae168e1a55bbb4bd89455c279f4b
            entity_id: light.garage_exterior
            domain: light
      - conditions:
          - condition: trigger
            id: GunSafe_MotionDetected
        sequence:
          - service: notify.steven_tiffany
            data:
              title: Gun Safe
              message: Door OPENED
          - delay:
              hours: 0
              minutes: 10
              seconds: 0
              milliseconds: 0
    default: []
mode: single
```
