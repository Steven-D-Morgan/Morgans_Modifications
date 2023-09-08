# Lets Automate Some Shit - Episode 003
- [YouTube]()

___
- # In this episode, we go over consolidating automations along with why you should and how to do so #
- The YAML below is related to the associated video linked at the top. The goal is to give everyone a basic understanding on what is possible to get you started, many of these could be added onto indefinetely.



```
alias: (TIMER) Bathrooms
description: ""
trigger:
  - platform: state
    entity_id:
      - fan.hallway_bathroom_exhaust
      - fan.master_bathroom_toilet_exhaust
    to: "on"
    for:
      hours: 0
      minutes: 40
      seconds: 0
    alias: ExhaustFans_ON
    id: ExhaustFans_ON
  - platform: state
    entity_id:
      - light.hallway_bathroom_vanity
      - light.master_bathroom_toilet
    to: "on"
    for:
      hours: 0
      minutes: 30
      seconds: 0
    alias: Lighting_ON
    id: Lighting_ON
condition: []
action:
  - choose:
      - conditions:
          - condition: trigger
            id:
              - ExhaustFans_ON
            alias: "TRIGGER: ExhaustFans_ON"
        sequence:
          - service: fan.turn_off
            target:
              entity_id: "{{ trigger.entity_id }}"
      - conditions:
          - condition: trigger
            id:
              - Lighting_ON
            alias: "TRIGGER: Lighting_ON"
        sequence:
          - service: light.turn_off
            target:
              entity_id: "{{ trigger.entity_id }}"
mode: single

```
