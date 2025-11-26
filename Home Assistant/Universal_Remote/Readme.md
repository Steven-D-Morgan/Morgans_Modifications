# Build Your Own Digital Universal Remote
- This is the template code I use where the positioning work has already been completed for you.
- [Here](https://github.com/Steven-D-Morgan/Morgans_Modifications/tree/main/Home%20Assistant/Universal_Remote/Remote%20Icons) are some logos to help you get started.
- We will be using the built in [Picture Elements Card](https://www.home-assistant.io/dashboards/picture-elements/)
- [Removal.ai](https://removal.ai/) is a great online tool to remove backgrounds from images/logos.
```
type: picture-elements
elements:
  - type: service-button
    style:
      top: 11%
      left: 12.2%
    action: script.1763930157752
  - type: service-button
    style:
      top: 29%
      left: 12.2%
    action: script.1763930131846
  - type: service-button
    style:
      top: 47%
      left: 12.81%
    action: script.1763930209064
  - type: service-button
    style:
      top: 65%
      left: 12.9%
    action: script.1763930392108
  - type: service-button
    style:
      top: 85%
      left: 13.05%
    action: script.1763930366898
  - type: service-button
    style:
      top: 24.3%
      left: 36.4%
    action: script.1763930698037
  - type: service-button
    style:
      top: 52.1%
      left: 36.9%
    action: script.1763929535354
  - type: service-button
    style:
      top: 79.4%
      left: 36.9%
    action: script.1764005805890
  - type: service-button
    style:
      top: 93.1%
      left: 36.9%
    action: script.1763958995961
  - type: service-button
    style:
      top: 10.6%
      left: 63%
    service: shell_command.living_room_roku_off
  - type: service-button
    style:
      top: 24.4%
      left: 62.5%
    action: script.1764005705039
  - type: service-button
    style:
      top: 38.4%
      left: 62.5%
    action: script.lg_master_bedroom_up
  - type: service-button
    style:
      top: 51.8%
      left: 63.2%
    action: script.1763930719976
  - type: service-button
    style:
      top: 65.8%
      left: 63.2%
    action: script.1763929502452
  - type: service-button
    style:
      top: 79.1%
      left: 63.2%
    action: script.1763929785686
  - type: service-button
    style:
      top: 93.1%
      left: 63.2%
    action: script.1763929949997
  - type: service-button
    style:
      top: 24.19%
      left: 89.5%
    action: script.1763930625073
  - type: service-button
    style:
      top: 52.1%
      left: 89.5%
    action: script.lg_master_bedroom_right
  - type: service-button
    style:
      top: 93.1%
      left: 89.5%
    action: script.1763929920525
image: /local/Media/TV/_SDM_Remote.png

```

