# SIMPLE LIGHT CARD
[YouTube Video]()
### My Stacked Card
![The Code Below](https://github.com/Steven-D-Morgan/Morgans_Modifications/blob/main/Resources/Home%20Assistant/Simple%20Light%20Card.png)
```
type: vertical-stack
cards:
  - type: horizontal-stack
    cards:
      - type: custom:button-card
        entity: light.living_room_floor_lamp_01
        name: Lego Lamp
        size: 45px
        show_label: false
        show_state: false
        show_name: true
        state:
          - value: "off"
            color: grey
            icon: mdi:lightbulb-off-outline
          - value: "on"
            color: green
            icon: mdi:floor-lamp
            styles:
              name:
                - color: yellow
        styles:
          card:
            - height: 70px
          name:
            - letter-spacing: 0.001em
            - font-familly: Calibri
            - justify-self: Center
            - padding: 0px 0px
            - font-size: 15px
          state:
            - text-transform: uppercase
      - type: custom:button-card
        entity: light.living_room_floor_lamp_02
        name: Chair Lamp
        size: 45px
        show_label: false
        show_state: false
        show_name: true
        state:
          - value: "off"
            color: grey
            icon: mdi:lightbulb-off-outline
          - value: "on"
            color: green
            icon: mdi:floor-lamp
            styles:
              name:
                - color: yellow
        styles:
          card:
            - height: 70px
          name:
            - letter-spacing: 0.001em
            - font-familly: Calibri
            - justify-self: Center
            - padding: 0px 0px
            - font-size: 15px
          state:
            - text-transform: uppercase
  - type: vertical-stack
    cards:
      - type: entities
        entities:
          - type: custom:paper-buttons-row
            buttons:
              - tap_action:
                  action: call-service
                  service: light.turn_off
                  service_data:
                    entity_id: light.living_room_can_lights
                icon: mdi:lightbulb-off-outline
                styles:
                  button:
                    color: white
                name: false
              - entity: script.living_room_can_lights_5500k
                icon: mdi:lightbulb
                styles:
                  button:
                    color: white
                name: false
              - entity: script.living_room_can_lights_3500k
                icon: mdi:lightbulb
                styles:
                  button:
                    color: rgb(255,193,141)
                name: false
              - entity: script.living_room_can_lights_red
                icon: mdi:lightbulb
                styles:
                  button:
                    color: rgb(255,0,0)
                name: false
              - entity: script.living_room_can_lights_green
                icon: mdi:lightbulb
                styles:
                  button:
                    color: rgb(0,255,0)
                name: false
              - entity: script.living_room_can_lights_blue
                icon: mdi:lightbulb
                styles:
                  button:
                    color: rgb(0,0,255)
                name: false
              - entity: script.living_room_can_lights_blue_0_255_255
                icon: mdi:lightbulb
                styles:
                  button:
                    color: rgb(0,255,255)
                name: false
              - entity: script.living_room_can_lights_purple
                icon: mdi:lightbulb
                styles:
                  button:
                    color: rgb(128,0,255)
                name: false
              - entity: script.living_room_can_lights_yellow
                icon: mdi:lightbulb
                styles:
                  button:
                    color: rgb(255,255,0)
                name: false
              - entity: script.living_room_can_lights_pink_255100255
                icon: mdi:lightbulb
                styles:
                  button:
                    color: rgb(255,0,255)
                name: false
        theme: kibibit-dark-cards
      - type: custom:mushroom-select-card
  - type: custom:slider-entity-row
    dir: rtr
    entity: light.living_room_can_lights

```
### Light Script Sample
```
sequence:
  - action: light.turn_on
    metadata: {}
    target:
      entity_id: light.living_room_can_lights
    data:
      color_temp_kelvin: 5500
      brightness_pct: 100
alias: "Living Room Can Lights: 5500k"
description: ""

```
