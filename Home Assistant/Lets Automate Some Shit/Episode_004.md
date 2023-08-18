# Lets Automate Some Shit - Episode 004
- [YouTube]()

___
- In this episode, we go over using the built in App device tracker to perform actions based on when you arrive or leave home as well as if it is day or night.
- The YAML below is related to the associated video linked at the top. The goal is to give everyone a basic understanding on what is possible to get you started, many of these automations could be added onto indefinetely. 
```
alias: (GPS) Home/Away
description: ""
trigger:
  - platform: state
    entity_id:
      - person.steven_morgan
    to: home
    id: SDM_Home
    alias: SDM = Home
  - platform: state
    entity_id:
      - person.steven_morgan
    to: not_home
    id: SDM_Away
    alias: SDM = Away
condition: []
action:
  - choose:
      - conditions:
          - condition: time
            alias: Night
            after: "20:30:00"
            before: "06:45:00"
            weekday:
              - sun
              - sat
              - fri
              - thu
              - wed
              - mon
              - tue
        sequence:
          - choose:
              - conditions:
                  - condition: trigger
                    id:
                      - SDM_Home
                    alias: SDM Home (NIGHT)
                sequence:
                  - service: cover.open_cover
                    data: {}
                    target:
                      entity_id: cover.garage_door
                    alias: "Garage Door: OPEN"
                  - service: light.turn_on
                    data: {}
                    target:
                      entity_id:
                        - light.garage_exterior
                        - light.garage_ceiling_tubes
                        - light.laundry_room
                        - light.front_porch
                    alias: "Lights: ON"
                  - delay:
                      hours: 0
                      minutes: 5
                      seconds: 0
                      milliseconds: 0
                  - service: cover.close_cover
                    data: {}
                    target:
                      entity_id: cover.garage_door
                    alias: "Garage Door: CLOSE"
                  - service: light.turn_off
                    data: {}
                    target:
                      entity_id:
                        - light.garage_exterior
                        - light.garage_ceiling_tubes
                        - light.laundry_room
                        - light.front_porch
                    alias: "Lights: OFF"
              - conditions:
                  - condition: trigger
                    id:
                      - SDM_Away
                    alias: SDM Away (NIGHT)
                sequence:
                  - service: cover.close_cover
                    data: {}
                    target:
                      entity_id: cover.garage_door
                    alias: "Garage: CLOSE"
                  - service: lock.lock
                    data: {}
                    target:
                      entity_id:
                        - lock.front_door_deadbolt
                        - lock.garage_exterior_deadbolt
                    alias: "Doors: LOCK"
                  - service: light.turn_off
                    data: {}
                    target:
                      entity_id:
                        - light.garage_exterior
                        - light.front_porch
                        - light.garage_ceiling_tubes
                        - light.office_entry_lamp
                        - light.office_ceiling
                    alias: "Lights: OFF"
            alias: "Night: SDM"
      - conditions:
          - condition: time
            alias: Day
            after: "06:45:00"
            before: "20:30:00"
            weekday:
              - sun
              - sat
              - fri
              - thu
              - wed
              - mon
              - tue
        sequence:
          - choose:
              - conditions:
                  - condition: trigger
                    id:
                      - SDM_Home
                    alias: SDM Home (DAY)
                sequence:
                  - service: cover.open_cover
                    data: {}
                    target:
                      entity_id: cover.garage_door
                    alias: "Garage Door: OPEN"
                  - delay:
                      hours: 0
                      minutes: 5
                      seconds: 0
                      milliseconds: 0
                  - service: cover.close_cover
                    data: {}
                    target:
                      entity_id: cover.garage_door
                    alias: "Garage Door: CLOSE"
              - conditions:
                  - condition: trigger
                    id:
                      - SDM_Away
                    alias: SDM Away (DAY)
                sequence:
                  - service: cover.close_cover
                    data: {}
                    target:
                      entity_id: cover.garage_door
                    alias: "Garage: CLOSE"
                  - service: lock.lock
                    data: {}
                    target:
                      entity_id:
                        - lock.front_door_deadbolt
                        - lock.garage_exterior_deadbolt
                    alias: "Doors: LOCK"
                  - service: light.turn_off
                    data: {}
                    target:
                      entity_id:
                        - light.garage_exterior
                        - light.front_porch
                        - light.garage_ceiling_tubes
                        - light.living_room_bar_lamp
                        - light.master_bedroom_tv
                        - light.master_bedroom_closet
                        - light.master_bedroom_ceiling
                        - light.breakfast_table
                    alias: "Lights: OFF"
            alias: "Day: SDM"
  - choose:
      - conditions: []
        sequence: []
mode: single

```
