# CALENDAR
- Home Assistant [Calendar](https://www.home-assistant.io/integrations/calendar/) Documentation
- Home Assistant [CalDAV](https://www.home-assistant.io/integrations/caldav/) Documentation
### Using Specific Calendars
- Filter to only bring in certain calendars to Home Assistant.
```
  - platform: caldav
    username: !secret apple_username
    password: !secret apple_app_password
    url: https://caldav.icloud.com
   calendars:
     - "Custody Rotation"
     - "My Calendar"
    verify_ssl: true
```
### Using Custom Calendars
- This is an awesome feature, you can search your calendar for specific events.
  - Home Assistant then creates a sensor for if they are active or not.
- In my sample code below, I have a custom calendar that searches for the keywords "Abel & Cooper with Tiffany".
  - Now I have sensors for when they are and are not with me. Which is useful for enabling/disabling certain automations.
```
  - platform: caldav
    username: !secret apple_username
    password: !secret apple_app_password
    url: https://caldav.icloud.com
    custom_calendars:
      - name: "Birthdays"
        calendar: "Birthdays"
        search: "Birthday"
      - name: "Abel & Cooper with Tiffany"
        calendar: "Custody Rotation"
        search: "Abel & Cooper with Tiffany"
    verify_ssl: true
```
