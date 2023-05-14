Home Assistant - Emporia Vue Integration
 ---
 - Documentation referenced in my [YouTube Video](https://www.youtube.com/@morgansmodifications)
 - Emporia Vue 3rd Party Integration can be found [here](https://github.com/magico13/ha-emporia-vue)
___
### sensors.yaml
 - Template to use wherever you keep the sensors section of your configuration.yaml
```
###########################################
### Per kWh ###############################
###########################################
- platform: template
  sensors:
    rutherford_per_kwh:
      friendly_name: "REMC $/kWh"
      unit_of_measurement: "USD"
      value_template: "{{ ('0.1062824858757062') | float(0) }}"
      
###########################################
### Breaker 01, 03 ########################
###########################################
    cost_breaker_01_03_today:
      friendly_name: "01,03: Today"
      unit_of_measurement: "USD"
      value_template: "{{ (states('sensor.meter_0103_today') | float(0) * states('sensor.rutherford_per_kwh') | float(0)) | round(2) }}"
    cost_breaker_01_03_mtd:
      friendly_name: "01,03: MTD"
      unit_of_measurement: "USD"
      value_template: "{{ (states('sensor.meter_0103_mtd') | float(0) * states('sensor.rutherford_per_kwh') | float(0)) | round(2) }}"
    cost_breaker_01_03_qtd:
      friendly_name: "01,03: QTD"
      unit_of_measurement: "USD"
      value_template: "{{ (states('sensor.meter_0103_qtd') | float(0) * states('sensor.rutherford_per_kwh') | float(0)) | round(2) }}"
    cost_breaker_01_03_atd:
      friendly_name: "01,03: ATD"
      unit_of_measurement: "USD"
      value_template: "{{ (states('sensor.meter_0103_atd') | float(0) * states('sensor.rutherford_per_kwh') | float(0)) | round(2) }}"

###########################################
### Total Consumption and % of Total ######
###########################################
    emporia_meters_1day_total_kwh:
      friendly_name: "Total"
      unit_of_measurement: "kWh"
      device_class: power
      value_template: "{{ states('sensor.emporia_01_1day_kwh') | float(0) + states('sensor.emporia_02_1day_kwh') | float(0) | round(0) }}"
    cost_percent_adu_today:
      friendly_name: "ADU: Today %"
      unit_of_measurement: "%"
      value_template: >-
        {% set Total = states('sensor.cost_power_today') | float %}
        {% set Partial = states('sensor.cost_adu_today') | float %}
        {{ (100 - (((Total - Partial) / Total) * 100)) | round(1) }}
    cost_percent_adu_mtd:
      friendly_name: "ADU: MTD %"
      unit_of_measurement: "%"
      value_template: >-
        {% set Total = states('sensor.cost_power_mtd') | float %}
        {% set Partial = states('sensor.cost_adu_mtd') | float %}
        {{ (100 - (((Total - Partial) / Total) * 100)) | round(1) }}
    cost_percent_adu_qtd:
      friendly_name: "ADU: QTD %"
      unit_of_measurement: "%"
      value_template: >-
        {% set Total = states('sensor.cost_power_qtd') | float %}
        {% set Partial = states('sensor.cost_adu_qtd') | float %}
        {{ (100 - (((Total - Partial) / Total) * 100)) | round(1) }}
    cost_percent_adu_atd:
      friendly_name: "ADU: ATD %"
      unit_of_measurement: "%"
      value_template: >-
        {% set Total = states('sensor.cost_power_atd') | float %}
        {% set Partial = states('sensor.cost_adu_atd') | float %}
        {{ (100 - (((Total - Partial) / Total) * 100)) | round(1) }}
    breakers_14_16_22_24_combined_1day_kwh:
      friendly_name: "Guest House"
      unit_of_measurement: "kWh"
      device_class: power
      value_template: >-
        {% set breaker_14 = states('sensor.breaker_14_1day_kwh') %}
        {% set breaker_16 = states('sensor.breaker_16_1day_kwh') %}
        {% set breaker_22 = states('sensor.breaker_22_1day_kwh') %}
        {% set breaker_24 = states('sensor.breaker_24_1day_kwh') %}
        {{ (breaker_14 | float(0) + breaker_16 | float(0) + breaker_22 | float(0) + breaker_24 | float(0)) | round(2) }}
    breakers_all_minus_14_16_22_24_1day_kwh:
      friendly_name: "Main House"
      unit_of_measurement: "kWh"
      device_class: power
      value_template: >-
        {% set emporia_total = states('sensor.emporia_meters_1day_total_kwh') %}
        {% set guest_house_breakers = states('sensor.breakers_14_16_22_24_combined_1day_kwh') %}
        {{ (emporia_total | float(0) - guest_house_breakers | float(0)) | round(2) }}

```
___
### Standard Markdown Card
 - Simple way of displaying raw data from Emporia Integration along with template sensors created using templates above.
```

type: markdown
content: >-
  # Breaker 01,03 #

  60A

  **Heat Pump** *(Auxillary Heat)*

  - Today: **${{ states('sensor.cost_breaker_01_03_today') }}** - *{{
  states('sensor.meter_0103_today') }} kWh*

  - MTD: **${{ states('sensor.cost_breaker_01_03_mtd') }}** - *{{
  states('sensor.meter_0103_mtd') }} kWh*

  - QTD: **${{ states('sensor.cost_breaker_01_03_qtd') }}** - *{{
  states('sensor.meter_0103_qtd') }} kWh*

  - ATD: **${{ states('sensor.cost_breaker_01_03_atd') }}** - *{{
  states('sensor.meter_0103_atd') }} kWh*

  ---

  - 1 Minute: **{{ states('sensor.breaker_01_03_1minute_watts') }}w**

  - 1 Day: **{{ states('sensor.breaker_01_03_1day_kwh') }} kWh**

  ---
```
___


