### LOCATION ###
 - Below are the coordinates of the White House in Washington, DC
    - Latitude: 38.897957
    - Longitude: -77.036560
    - Altitude: 59
 - To embed these coordinates into the MetaData of a media file...
      ```
      -xmp:gpslatitude="38.897957" -xmp:gpslongitude="-77.036560" -xmp:gpsaltitude="59" -xmp:latitude="38.897957" -xmp:longitude="-77.036560"
      ```
***
### RENAME ENTIRE DIRECTORY OF FILE NAMES ###
      "-FileName<DateTimeOriginal" -d (%m-%d-%Y)%%-c.%%e .
***
### REMOVING ALL METADATA ###
 - There are many reasons why you would want to do this.
  - Posting an image online
  - Removing all MetaData before standardizing what you want shown.
  - Other reasons
 - *The -overwrite_original command is not needed if using the GUI and have the make a copy of file option disabled)*
      ```
      -all:all= -r
      ```
***

- QuickTime:CreateDate="2012:12:12 12:12:12"
  - YYYY:MM:DD HH:MM:SS
- EXIF:ModifyDate="2012:12:12 12:12:12"
  - YYYY:MM:DD HH:MM:SS
- IPTC:TimeCreated="12:12:12-05:00"
  - HH:MM:SS-TZ:TZ
- IPTC:DateCreated="12:12:12"
  - YYYY:MM:DD
- DateCreated="SEE BELOW"
  - JPEG, JPG, GIF = YYYY:MM:DD HH:MM:SS
  - PNG = YYYY:MM:DD


***
| COMMAND | MOV | MP4 | GIF | PNG | JPEG | JPG |
| ----------- | ----------- | ----------- | ----------- | ----------- | ----------- | ----------- |
| "-QuickTime:CreateDate<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |  |
| "-QuickTime:ModifyDate<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |  |
| "-EXIF:CreateDate<QuickTime:CreateDate" |  |  | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-EXIF:DateTimeOriginal<QuickTime:CreateDate" |  |  |  | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-EXIF:ModifyDate<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |  | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-IPTC:TimeCreated<QuickTime:CreateDate" | | | | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-IPTC:DateCreated<QuickTime:CreateDate" | | | | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-XMP:DateTimeOriginal<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-XMP-exif:DateTimeOriginal<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-XMP-xmp:CreateDate<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-XMP-xmp:ModifyDate<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-XMP-pdf:CreationDate<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-XMP-photoshop:DateCreated<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-CreationTime<QuickTime:CreateDate" |  | | | <ul><li>[x] </li></ul> |  |  |  |
| "-CreationDate<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-CreateDate<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-DigitalCreationDate<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-ModifyDate<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-DateTime<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
| "-DateCreated<QuickTime:CreateDate" | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> | <ul><li>[x] </li></ul> |
