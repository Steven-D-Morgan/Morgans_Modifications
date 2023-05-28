# Alexa Custom Component
[YouTube]()
[Alexa Media Player](https://github.com/custom-components/alexa_media_player)
___
**AUTOMATION ACTIONS**

```
service: media_player.volume_set
data:
  volume_level: 0.4
target:
  entity_id: media_player.kitchen_echo
alias: "Volume: Kitchen Echo"
```

```
service: notify.alexa_media
data:
  target:
    - media_player.kitchen_echo
  data:
    type: tts
  message: >-
    {{ ["Human, go unload the dryer", "Your clothes have finished drying", "Time to go empty the Dryer"] | random }}
alias: "Alexa: Kitchen Echo"
```
