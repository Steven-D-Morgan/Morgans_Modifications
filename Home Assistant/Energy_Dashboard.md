Home Assistant - My Energy Dashboard
 ---
 - Documentation referenced in my [YouTube Video](https://www.youtube.com/@morgansmodifications)
 - Emporia Vue 3rd Party Integration can be found [here](https://github.com/magico13/ha-emporia-vue)
 - Custom Card: [Apex Charts](https://github.com/RomRider/apexcharts-card)
 - Custom Card: [Horizotal/Vertical Stack In](https://github.com/custom-cards/stack-in-card)
___
### Raw YAML for my Energy Dashboard
 - Template to use wherever you keep the sensors section of your configuration.yaml
```
views:
  - theme: Backend-selected
    title: Overview
    icon: mdi:home-battery-outline
    badges: []
    cards:
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Energy Review

              Today, we have consumed **${{ states('sensor.cost_power_today')
              }}**  - {{ states('sensor.meter_mdp_today') }} kWh.

              MTD, we have consumed **${{ states('sensor.cost_power_mtd') }}** 
              - {{ states('sensor.meter_mdp_mtd') }} kWh.


              - Today, Scott has consumed **${{ states('sensor.cost_adu_today')
              }}** or **{{ states('sensor.cost_percent_adu_today') }}%** of all
              energy used.

              - MTD, Scott has consumed **${{ states('sensor.cost_adu_mtd') }}**
              or **{{ states('sensor.cost_percent_adu_mtd') }}%** of all energy
              used.

              - QTD, Scott has consumed **${{ states('sensor.cost_adu_qtd') }}**
              or **{{ states('sensor.cost_percent_adu_qtd') }}%** of all energy
              used.

              - ATD, Scott has consumed **${{ states('sensor.cost_adu_atd') }}**
              or **{{ states('sensor.cost_percent_adu_atd') }}%** of all energy
              used.


              **METERING BEGAN MID MARCH**
      - type: vertical-stack
        cards:
          - type: custom:power-flow-card
            entities:
              grid:
                consumption: sensor.meter_mdp_today
          - type: tile
            entity: sensor.emporia_meters_1day_total_kwh
          - type: horizontal-stack
            cards:
              - type: tile
                entity: sensor.breakers_all_minus_14_16_22_24_1day_kwh
              - type: tile
                entity: sensor.breakers_14_16_22_24_combined_1day_kwh
      - type: custom:apexcharts-card
        experimental:
          color_threshold: true
        graph_span: 24h
        show:
          last_updated: true
        header:
          standard_format: false
          show: true
          show_states: true
          colorize_states: true
          title: Total Power Consumption Today
        span:
          start: day
        series:
          - entity: sensor.emporia_meters_1day_total_kwh
            type: line
            group_by:
              func: last
              duration: 15m
            stroke_width: 4
            show:
              header_color_threshold: true
            color_threshold:
              - value: 30
                color: green
              - value: 45
                color: steelblue
              - value: 50
                color: midnightblue
              - value: 60
                color: orange
              - value: 70
                color: orangered
              - value: 80
                color: red
      - type: vertical-stack
        cards:
          - chart_type: bar
            period: day
            days_to_show: 3
            type: statistics-graph
            entities:
              - sensor.meter_mdp_today
              - sensor.meter_adu_today
            title: Daily Energy Usage
            stat_types:
              - sum
      - type: custom:apexcharts-card
        apex_config:
          chart:
            stacked: true
        graph_span: 7d
        span:
          end: day
        show:
          last_updated: true
        header:
          show: true
          show_states: true
          colorize_states: true
          title: Daily Energy Consumption
        series:
          - entity: sensor.cost_power_today
            name: Home
            type: column
            unit: ' USD'
            color: darkviolet
            group_by:
              func: max
              duration: 1d
          - entity: sensor.breakers_all_minus_14_16_22_24_1day_kwh
            name: House
            type: column
            color: orangered
            group_by:
              func: max
              duration: 1d
          - entity: sensor.breakers_14_16_22_24_combined_1day_kwh
            name: ADU
            type: column
            color: slateblue
            group_by:
              func: max
              duration: 1d
  - title: Today
    path: today
    type: panel
    badges: []
    cards:
      - type: custom:apexcharts-card
        chart_type: pie
        header:
          show: true
          show_states: true
          colorize_states: true
        series:
          - entity: sensor.meter_0103_today
            name: HVAC - Aux Heat
          - entity: sensor.meter_0204_today
            name: Oven
          - entity: sensor.meter_0507_today
            name: Heat Pump
          - entity: sensor.meter_0608_today
            name: Dryer
          - entity: sensor.meter_0911_today
            name: Well Pump
          - entity: sensor.meter_10a_today
            name: 10a (Outlets)
          - entity: sensor.meter_10b_today
            name: 10b (Outlets)
          - entity: sensor.meter_12a_today
            name: Breaker 12a
          - entity: sensor.meter_12b_today
            name: 12b (Microwave)
          - entity: sensor.meter_13_today
            name: Breaker 13
          - entity: sensor.meter_adu_today
            name: ADU
          - entity: sensor.meter_15_today
            name: Guest Bedroom
          - entity: sensor.meter_20b_today
            name: Dishwasher, Freezer, Kitchen
          - entity: sensor.meter_21_today
            name: Office
          - entity: sensor.meter_23_today
            name: Breaker 23
          - entity: sensor.meter_25a_25b_today
            name: Kitchen Counter Outlets
            type: column
          - entity: sensor.meter_26a_today
            name: 26a (Outlets)
          - entity: sensor.meter_27a_today
            name: 27a (Outlets)
          - entity: sensor.meter_27b_today
            name: Water Heater
          - entity: sensor.meter_28a_today
            name: Breaker 28a
          - entity: sensor.meter_28b_today
            name: Abels Bedroom & Washroom
          - entity: sensor.meter_29a_today
            name: Breaker 29a
          - entity: sensor.meter_29b_31a_today
            name: Pool
          - entity: sensor.meter_30a_today
            name: Living Room Outlets
          - entity: sensor.meter_30b_today
            name: 30b (Lights)
          - entity: sensor.meter_32a_32b_today
            name: Garage
  - theme: Backend-selected
    icon: fas:chart-pie
    type: panel
    badges: []
    cards:
      - type: custom:apexcharts-card
        chart_type: pie
        header:
          show: true
          show_states: true
          colorize_states: true
        series:
          - entity: sensor.meter_0103_mtd
            name: HVAC Aux Heat
          - entity: sensor.meter_0204_mtd
            name: Oven
          - entity: sensor.meter_0507_mtd
            name: Heat Pump
          - entity: sensor.meter_0608_mtd
            name: Dryer
          - entity: sensor.meter_0911_mtd
            name: Well Pump
          - entity: sensor.meter_10a_mtd
            name: 10a (Outlets)
          - entity: sensor.meter_10b_mtd
            name: 10b (Outlets)
          - entity: sensor.meter_12a_mtd
            name: Breaker 12a
          - entity: sensor.meter_12b_mtd
            name: 12b (Microwave)
          - entity: sensor.meter_13_mtd
            name: Breaker 13
          - entity: sensor.meter_adu_mtd
            name: ADU
          - entity: sensor.meter_15_mtd
            name: Guest Bedroom
          - entity: sensor.meter_20b_mtd
            name: Dishwasher, Freezer, Kitchen
          - entity: sensor.meter_21_mtd
            name: Office
          - entity: sensor.meter_23_mtd
            name: Breaker 23
          - entity: sensor.meter_25a_25b_mtd
            name: Kitchen Counter Outlets
            type: column
          - entity: sensor.meter_26a_mtd
            name: 26a (Outlets)
          - entity: sensor.meter_27a_mtd
            name: 27a (Outlets)
          - entity: sensor.meter_27b_mtd
            name: Water Heater
          - entity: sensor.meter_28a_mtd
            name: Breaker 28a
          - entity: sensor.meter_28b_mtd
            name: Abels Bedroom & Washroom
          - entity: sensor.meter_29a_mtd
            name: Breaker 29a
          - entity: sensor.meter_29b_31a_mtd
            name: Pool
          - entity: sensor.meter_30a_mtd
            name: Living Room Outlets
          - entity: sensor.meter_30b_mtd
            name: 30b (Lights)
          - entity: sensor.meter_32a_32b_mtd
            name: Garage
  - theme: Backend-selected
    title: Breakers
    path: mdp-breakers
    icon: mdi:meter-electric-outline
    badges: []
    cards:
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 01,03 #


              60A


              **Heat Pump** *(Auxillary Heat)*


              - Today: **${{ states('sensor.cost_breaker_01_03_today') }}** -
              *{{ states('sensor.meter_0103_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_01_03_mtd') }}** - *{{
              states('sensor.meter_0103_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_01_03_qtd') }}** - *{{
              states('sensor.meter_0103_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_01_03_atd') }}** - *{{
              states('sensor.meter_0103_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_01_03_1minute_watts')
              }}w**

              - 1 Day: **{{ states('sensor.breaker_01_03_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 02,04 #


              40A


              **Oven**


              - Today: **${{ states('sensor.cost_breaker_02_04_today') }}** -
              *{{ states('sensor.meter_0204_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_02_04_mtd') }}** - *{{
              states('sensor.meter_0204_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_02_04_qtd') }}** - *{{
              states('sensor.meter_0204_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_02_04_atd') }}** - *{{
              states('sensor.meter_0204_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_02_04_1minute_watts')
              }}w**

              - 1 Day: **{{ states('sensor.breaker_02_04_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 05,07 #


              30A


              **Heat Pump**


              - Today: **${{ states('sensor.cost_breaker_05_07_today') }}** -
              *{{ states('sensor.meter_0507_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_05_07_mtd') }}** - *{{
              states('sensor.meter_0507_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_05_07_qtd') }}** - *{{
              states('sensor.meter_0507_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_05_07_atd') }}** - *{{
              states('sensor.meter_0507_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_05_07_1minute_watts')
              }}w**

              - 1 Day: **{{ states('sensor.breaker_05_07_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 06,08 #


              30A


              **Clothes Dryer**


              - Today: **${{ states('sensor.cost_breaker_06_08_today') }}** -
              *{{ states('sensor.meter_0608_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_06_08_mtd') }}** - *{{
              states('sensor.meter_0608_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_06_08_qtd') }}** - *{{
              states('sensor.meter_0608_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_06_08_atd') }}** - *{{
              states('sensor.meter_0608_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_06_08_1minute_watts')
              }}w**

              - 1 Day: **{{ states('sensor.breaker_06_08_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 09,11 #


              20A


              **Well Pump**


              - Today: **${{ states('sensor.cost_breaker_09_11_today') }}** -
              *{{ states('sensor.meter_0911_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_09_11_mtd') }}** - *{{
              states('sensor.meter_0911_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_09_11_qtd') }}** - *{{
              states('sensor.meter_0911_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_09_11_atd') }}** - *{{
              states('sensor.meter_0911_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_09_11_1minute_watts')
              }}w**

              - 1 Day: **{{ states('sensor.breaker_09_11_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 10a #


              20A


              **OUTLETS:** Jack n' Jill Bathroom, Hallway Bathroom, Jack n' Jill
              Wash Rooms


              - Today: **${{ states('sensor.cost_breaker_10a_today') }}** - *{{
              states('sensor.meter_10a_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_10a_mtd') }}** - *{{
              states('sensor.meter_10a_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_10a_qtd') }}** - *{{
              states('sensor.meter_10a_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_10a_atd') }}** - *{{
              states('sensor.meter_10a_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_10a_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_10a_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 10b #


              20A


              **Clothes Washer**

              **OUTLETS:** Below Laundry Room Window


              - Today: **${{ states('sensor.cost_breaker_10b_today') }}** - *{{
              states('sensor.meter_10b_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_10b_mtd') }}** - *{{
              states('sensor.meter_10b_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_10b_qtd') }}** - *{{
              states('sensor.meter_10b_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_10b_atd') }}** - *{{
              states('sensor.meter_10b_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_10b_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_10b_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 12a #


              20A


              TBD


              - Today: **${{ states('sensor.cost_breaker_12a_today') }}** - *{{
              states('sensor.meter_12a_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_12a_mtd') }}** - *{{
              states('sensor.meter_12a_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_12a_qtd') }}** - *{{
              states('sensor.meter_12a_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_12a_atd') }}** - *{{
              states('sensor.meter_12a_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_12a_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_12a_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 12b #


              20A


              **Microwave**


              - Today: **${{ states('sensor.cost_breaker_12b_today') }}** - *{{
              states('sensor.meter_12b_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_12b_mtd') }}** - *{{
              states('sensor.meter_12b_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_12b_qtd') }}** - *{{
              states('sensor.meter_12b_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_12b_atd') }}** - *{{
              states('sensor.meter_12b_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_12b_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_12b_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 13 #


              20A


              **LIGHTS:** 

              **OUTLETS:** Master Bathroom

              **OTHER:**


              - Today: **${{ states('sensor.cost_breaker_13_today') }}** - *{{
              states('sensor.meter_13_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_13_mtd') }}** - *{{
              states('sensor.meter_13_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_13_qtd') }}** - *{{
              states('sensor.meter_13_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_13_atd') }}** - *{{
              states('sensor.meter_13_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_13_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_13_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 14 #


              100A


              **ADU Subpanel**


              - Today: **${{ states('sensor.cost_breaker_14_today') }}** - *{{
              states('sensor.meter_14_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_14_mtd') }}** - *{{
              states('sensor.meter_14_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_14_qtd') }}** - *{{
              states('sensor.meter_14_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_14_atd') }}** - *{{
              states('sensor.meter_14_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_14_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_14_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 15 #


              15A



              **LIGHTS:** Guest Bedroom

              **OUTLETS:** Guest Bedroom

              **OTHER:**  Alarm System


              - Today: **${{ states('sensor.cost_breaker_15_today') }}** - *{{
              states('sensor.meter_15_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_15_mtd') }}** - *{{
              states('sensor.meter_15_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_15_qtd') }}** - *{{
              states('sensor.meter_15_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_15_atd') }}** - *{{
              states('sensor.meter_15_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_15_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_15_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 16 #


              A

              **SUBPANEL** ADU


              - Today: **${{ states('sensor.cost_breaker_16_today') }}** - *{{
              states('sensor.meter_16_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_16_mtd') }}** - *{{
              states('sensor.meter_16_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_16_qtd') }}** - *{{
              states('sensor.meter_16_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_16_atd') }}** - *{{
              states('sensor.meter_16_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_16_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_16_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: |-
              # Breaker 17 #

              *BLANK*
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 20b #


              15A

              **OTHER:** Kitchen Sink Garbage Disposal


              **OTHER:** Dishwasher, Laundry Room Freezer


              - Today: **${{ states('sensor.cost_breaker_20b_today') }}** - *{{
              states('sensor.meter_20b_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_20b_mtd') }}** - *{{
              states('sensor.meter_20b_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_20b_qtd') }}** - *{{
              states('sensor.meter_20b_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_20b_atd') }}** - *{{
              states('sensor.meter_20b_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_20b_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_20b_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: |-
              # Breaker 19 #

              *BLANK*
      - type: vertical-stack
        cards:
          - type: markdown
            content: |-
              # Breaker 20a #

              20A

              *Spare In Attic*
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 21 #

              15A


              **LIGHTS:** Office

              **OUTLETS:** Office

              **OTHER:**


              - Today: **${{ states('sensor.cost_breaker_21_today') }}** - *{{
              states('sensor.meter_21_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_21_mtd') }}** - *{{
              states('sensor.meter_21_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_21_qtd') }}** - *{{
              states('sensor.meter_21_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_21_atd') }}** - *{{
              states('sensor.meter_21_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_21_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_21_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 22 #


              100A


              **ADU SUBPANEL**


              - Today: **${{ states('sensor.cost_breaker_22_today') }}** - *{{
              states('sensor.meter_22_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_22_mtd') }}** - *{{
              states('sensor.meter_22_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_22_qtd') }}** - *{{
              states('sensor.meter_22_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_22_atd') }}** - *{{
              states('sensor.meter_22_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_22_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_22_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 23


              15A


              **LIGHTS:** 

              **OUTLETS:** 

              **OTHER:**


              - Today: **${{ states('sensor.cost_breaker_23_today') }}** - *{{
              states('sensor.meter_23_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_23_mtd') }}** - *{{
              states('sensor.meter_23_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_23_qtd') }}** - *{{
              states('sensor.meter_23_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_23_atd') }}** - *{{
              states('sensor.meter_23_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_23_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_23_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 24 #


              100A


              **ADU SUBPANEL**


              - Today: **${{ states('sensor.cost_breaker_24_today') }}** - *{{
              states('sensor.meter_24_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_24_mtd') }}** - *{{
              states('sensor.meter_24_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_24_qtd') }}** - *{{
              states('sensor.meter_24_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_24_atd') }}** - *{{
              states('sensor.meter_24_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_24_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_24_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 25a & 25b #

              25a: 20A

              **OUTLETS:** Kitchen Countertop (Stove Side)

              25b: 20A

              **OUTLETS:** Kitchen Countertop (Sink Side)


              - Today: **${{ states('sensor.cost_breaker_25a_and_25b_today')
              }}** - *{{ states('sensor.meter_25a_25b_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_25a_and_25b_mtd') }}** -
              *{{ states('sensor.meter_25a_25b_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_25a_and_25b_qtd') }}** -
              *{{ states('sensor.meter_25a_25b_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_25a_and_25b_atd') }}** -
              *{{ states('sensor.meter_25a_25b_atd') }} kWh*

              ---

              - 1 Minute: **{{
              states('sensor.breaker_25a_and_25b_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_25a_and_25b_1day_kwh') }}
              kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 26a #


              20A


              **LIGHTS:** N/A

              **OUTLETS:** Mud Room, Kitchen Floor, Dining Room (Except Shared
              Bedroom Wall)

              **OTHER:**


              - Today: **${{ states('sensor.cost_breaker_26a_today') }}** - *{{
              states('sensor.meter_26a_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_26a_mtd') }}** - *{{
              states('sensor.meter_26a_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_26a_qtd') }}** - *{{
              states('sensor.meter_26a_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_26a_atd') }}** - *{{
              states('sensor.meter_26a_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_26a_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_26a_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 27a #


              20A


              **OUTLETS:** Living Room Bar Wall (x2), Behind Safe in Attic (x1)


              - Today: **${{ states('sensor.cost_breaker_27a_today') }}** - *{{
              states('sensor.meter_27a_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_27a_mtd') }}** - *{{
              states('sensor.meter_27a_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_27a_qtd') }}** - *{{
              states('sensor.meter_27a_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_27a_atd') }}** - *{{
              states('sensor.meter_27a_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_27a_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_27a_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 27b #


              20A


              **Gas Water Heater**


              - Today: **${{ states('sensor.cost_breaker_27b_today') }}** - *{{
              states('sensor.meter_27b_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_27b_mtd') }}** - *{{
              states('sensor.meter_27b_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_27b_qtd') }}** - *{{
              states('sensor.meter_27b_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_27b_atd') }}** - *{{
              states('sensor.meter_27b_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_27b_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_27b_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: |-
              # Breaker 28A #

              15A

              **Garage Rollup Door**

              *NOT METERED*
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 28b #


              15A


              **LIGHTS:** Abels Washroom Vanity

              **OUTLETS:** Hallway, Hallway Bathroom, Abels Bedroom (Except
              Behind Door)

              **OTHER:**


              - Today: **${{ states('sensor.cost_breaker_28b_today') }}** - *{{
              states('sensor.meter_28b_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_28b_mtd') }}** - *{{
              states('sensor.meter_28b_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_28b_qtd') }}** - *{{
              states('sensor.meter_28b_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_28b_atd') }}** - *{{
              states('sensor.meter_28b_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_28b_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_28b_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 29a #


              15A


              **LIGHTS:**

              **OUTLETS:** 

              **OTHER:**


              - Today: **${{ states('sensor.cost_breaker_29a_today') }}** - *{{
              states('sensor.meter_29a_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_29a_mtd') }}** - *{{
              states('sensor.meter_29a_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_29a_qtd') }}** - *{{
              states('sensor.meter_29a_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_29a_atd') }}** - *{{
              states('sensor.meter_29a_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_29a_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_29a_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 29b, 31a #


              30A


              **Pool Sub Panel**


              - Today: **${{ states('sensor.cost_breaker_29b_31a_today') }}** -
              *{{ states('sensor.meter_29b_31a_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_29b_31a_mtd') }}** - *{{
              states('sensor.meter_29b_31a_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_29b_31a_qtd') }}** - *{{
              states('sensor.meter_29b_31a_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_29b_31a_atd') }}** - *{{
              states('sensor.meter_29b_31a_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_29b_31a_1minute_watts')
              }}w**

              - 1 Day: **{{ states('sensor.breaker_29b_31a_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 30a #


              15A


              **OUTLETS:** Behind Abels Door, Living Room TV, Living Room (Abels
              Wall)


              - Today: **${{ states('sensor.cost_breaker_30a_today') }}** - *{{
              states('sensor.meter_30a_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_30a_mtd') }}** - *{{
              states('sensor.meter_30a_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_30a_qtd') }}** - *{{
              states('sensor.meter_30a_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_30a_atd') }}** - *{{
              states('sensor.meter_30a_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_30a_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_30a_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 30b #

              15A

              **LIGHTS:** Screen Porch Light/Fan, Pantry Hallway, Stairwell
              Closet, Garage, Garage Exterior, Garage Exterior Motion, Front
              Porch, Entryway/Foyer


              - Today: **${{ states('sensor.cost_breaker_30b_today') }}** - *{{
              states('sensor.meter_30b_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_30b_mtd') }}** - *{{
              states('sensor.meter_30b_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_30b_qtd') }}** - *{{
              states('sensor.meter_30b_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_30b_atd') }}** - *{{
              states('sensor.meter_30b_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_30b_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_30b_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 31b #


              20A


              **LIGHTS:** 


              - Today: **${{ states('sensor.cost_breaker_31b_today') }}** - *{{
              states('sensor.meter_31b_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_31b_mtd') }}** - *{{
              states('sensor.meter_31b_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_31b_qtd') }}** - *{{
              states('sensor.meter_31b_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_31b_atd') }}** - *{{
              states('sensor.meter_31b_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_31b_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_31b_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 32a, 32b #


              **32a:** 15A

              *OUTLETS:* Garage


              **32b:** 20a

              *OUTLETS:* Garage Dedicated Quad


              **Garage Outlets**


              - Today: **${{ states('sensor.cost_breaker_32a_32b_today') }}** -
              *{{ states('sensor.meter_32a_32b_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_32a_32b_mtd') }}** - *{{
              states('sensor.meter_32a_32b_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_32a_32b_qtd') }}** - *{{
              states('sensor.meter_32a_32b_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_32a_32b_atd') }}** - *{{
              states('sensor.meter_32a_32b_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_32a_32b_1minute_watts')
              }}w**

              - 1 Day: **{{ states('sensor.breaker_32a_32b_1day_kwh') }} kWh**

              ---
  - theme: Backend-selected
    title: ADU
    path: guest-house-energy
    icon: ''
    badges: []
    cards:
      - type: horizontal-stack
        cards:
          - type: tile
            entity: sensor.breakers_14_16_22_24_combined_1day_kwh
      - type: entities
        entities:
          - entity: sensor.meter_adu_today
          - entity: sensor.cost_adu_today
          - entity: sensor.meter_adu_mtd
          - entity: sensor.cost_adu_mtd
          - entity: sensor.meter_adu_qtd
          - entity: sensor.cost_adu_qtd
          - entity: sensor.meter_adu_atd
          - entity: sensor.cost_adu_atd
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 14 (100A)

              **ADU Subpanel**

              - Today: **${{ states('sensor.cost_breaker_14_today') }}** - *{{
              states('sensor.meter_14_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_14_mtd') }}** - *{{
              states('sensor.meter_14_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_14_qtd') }}** - *{{
              states('sensor.meter_14_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_14_atd') }}** - *{{
              states('sensor.meter_14_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_14_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_14_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 16 (100A)

              **ADU Subpanel**

              - Today: **${{ states('sensor.cost_breaker_16_today') }}** - *{{
              states('sensor.meter_16_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_16_mtd') }}** - *{{
              states('sensor.meter_16_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_16_qtd') }}** - *{{
              states('sensor.meter_16_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_16_atd') }}** - *{{
              states('sensor.meter_16_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_16_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_16_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 22 (100A)

              **ADU Subpanel**

              - Today: **${{ states('sensor.cost_breaker_22_today') }}** - *{{
              states('sensor.meter_22_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_22_mtd') }}** - *{{
              states('sensor.meter_22_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_22_qtd') }}** - *{{
              states('sensor.meter_22_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_22_atd') }}** - *{{
              states('sensor.meter_22_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_22_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_22_1day_kwh') }} kWh**

              ---
      - type: vertical-stack
        cards:
          - type: markdown
            content: >-
              # Breaker 24 (100A)

              **ADU Subpanel**

              - Today: **${{ states('sensor.cost_breaker_24_today') }}** - *{{
              states('sensor.meter_24_today') }} kWh*

              - MTD: **${{ states('sensor.cost_breaker_24_mtd') }}** - *{{
              states('sensor.meter_24_mtd') }} kWh*

              - QTD: **${{ states('sensor.cost_breaker_24_qtd') }}** - *{{
              states('sensor.meter_24_qtd') }} kWh*

              - ATD: **${{ states('sensor.cost_breaker_24_atd') }}** - *{{
              states('sensor.meter_24_atd') }} kWh*

              ---

              - 1 Minute: **{{ states('sensor.breaker_24_1minute_watts') }}w**

              - 1 Day: **{{ states('sensor.breaker_24_1day_kwh') }} kWh**

              ---
  - theme: Backend-selected
    title: Devices
    path: device-meters
    badges: []
    cards:
      - type: entities
        entities:
          - entity: sensor.dog_house_today_kwh
          - entity: sensor.dog_house_amps
          - entity: sensor.dog_house_watts
          - entity: sensor.meter_dog_house_mtd
          - entity: sensor.cost_dog_house_mtd
          - entity: sensor.meter_dog_house_atd
          - entity: sensor.cost_dog_house_atd
        title: Dog House
      - type: entities
        entities:
          - entity: sensor.server_today_kwh
          - entity: sensor.server_amps
          - entity: sensor.server_watts
          - entity: sensor.cost_server_mtd
          - entity: sensor.meter_server_today
          - entity: sensor.cost_server_atd
          - entity: sensor.meter_server_atd
        title: Server
```
