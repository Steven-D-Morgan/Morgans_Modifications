# TEMPLATING

### **2023_06_07_1819**
```
{{ now().strftime('%Y_%m_%d_%H%M') }}
```
```
service: camera.snapshot
data:
  filename: >-
    /config/www/Snapshots/GarageExterior/GarageExterior_{{ now().strftime('%Y_%m_%d_%H%M') }}.jpg
target:
  entity_id: camera.garage_exterior_main

```
___
### 
# Date Templating
```
snapshot_{{ now().strftime('%Y_%m_%d_%H_%M_%S_%f') }}
```
```
/config/www/Snapshots/GarageExterior_{{ now ().month }}_{{ now().day
        }}_{{ now ().year }}_{{ now ().hour }}_{{ now ().minute }}.jpg
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
