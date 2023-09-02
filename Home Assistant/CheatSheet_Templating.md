# TEMPLATING

### **2023_06_07_1819**
```
states('sensor.temperature')
```
# is_state()
- Determines then displays which (if any) of the two lights match the condition "on".
```
{{ ['light.kitchen', 'light.dining_room'] | select('is_state', 'on') | list }}
```
```
state_attr()
```
```
is_state_attr()
```
___
### 
# Date Templating
2023_09_01_22_59_15_101746
```
{{ now().strftime('%Y_%m_%d_%H_%M_%S_%f') }}
```
9_1_2023_22_58
```
{{ now ().month }}_{{ now().day}}_{{ now ().year }}_{{ now ().hour }}_{{ now ().minute }}
```
2023_09_01_2258
```
{{ now().strftime('%Y_%m_%d_%H%M') }}
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
___
### 
```
CODE HERE
```
