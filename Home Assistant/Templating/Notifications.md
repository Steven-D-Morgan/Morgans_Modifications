# Home Assistant Template Notifications
- Home Assistant template documentation [here](https://www.home-assistant.io/integrations/template/).

### Washing Machine 
```
action: notify.alexa_media
metadata: {}
data:
  message: >-
    {{ ["Human, go empty the washing machine", "Your clothes have finished  
    washing", "Washing machine cycle complete", "Time to go empty the
    washer"] | random }}
  data:
    type: tts
  target:
    - media_player.amp_master_bedroom_echo_show
    - media_player.amp_kitchen_echo
```
### Honey, I'm Home

```
action: notify.alexa_media
metadata: {}
data:
  message: >-
    {{ ["Honey, I am home", "Your other half is here", "Your better half has arrived", "Your worse half is home"] | random }}
  data:
    type: tts
  target:
    - media_player.amp_master_bedroom_echo_show
    - media_player.amp_kitchen_echo
```
