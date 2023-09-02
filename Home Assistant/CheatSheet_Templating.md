# TEMPLATING
- https://www.home-assistant.io/docs/configuration/templating/
### states()
- Returns the current state. For example, tempature sensors will return the reading
```
states('sensor.temperature')
```
### is_state()
- Determines then displays which (if any) of the two lights match the condition "on".
```
{{ ['light.kitchen', 'light.dining_room'] | select('is_state', 'on') | list }}
```
### state_attr()
```
state_attr()
```
### is_state_attr()
```
is_state_attr()
```
___
### 
# Time/Date
### 2023_09_01_22_59_15_101746
```
{{ now().strftime('%Y_%m_%d_%H_%M_%S_%f') }}
```
### 9_1_2023_22_58
```
{{ now ().month }}_{{ now().day}}_{{ now ().year }}_{{ now ().hour }}_{{ now ().minute }}
```
### 2023_09_01_2258
```
{{ now().strftime('%Y_%m_%d_%H%M') }}
```
___
###
# Device Tracking
```
{{closest('zone.home', 'group.all_user_trackers')}}

{{ closest(states).name }} is {{ distance(closest(states)) }} kilometers away.
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
___
### 
```
CODE HERE
```
