Home Assistant - Emporia Vue Integration
 ---
 - Documentation referenced in my [YouTube Video](https://www.youtube.com/@morgansmodifications)
 - Emporia Vue 3rd Party Integration can be found [here](https://github.com/magico13/ha-emporia-vue)
___
### sensors.yaml
    ###########################################
    ### Breaker 17 & 19 ########################
###########################################
### Breaker 01, 03 ########################
- platform: template
  sensors:
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
