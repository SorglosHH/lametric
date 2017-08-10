# Lametric-Backend

1) Put the fhem.php somewhere on your webserver with php support (must be same host as fhem).

2) Access fhem.php one time via webserver https/example.com/fhem.php
   it will create the file auth.php on your webserver to place login data

2) Set user and password for your local fhem installation inside the auth.php

3) Set personal security key inside the aurh.php

4) Download and configure fhem app to your lametric time

Note:

Sample setup inside the app:

Url:	http://www.sample.de or https://www.sample.de or https://www.sample.de/path_to_script_folder<br>
Port:	optional for servers running on custom ports<br>
Name:	Announce text of the app<br>
Device:	Your fhem device to get readings from<br>
Icon:	Icon to display with announce text (default is i8919 when left empty)<br>
Seckey:	Your custom string which must be same inside auth.php to get a result from script<br>
<br>
Reading 1-4:	readings to pick from fhem device<br>
Icon 1-4:	icon to show with reading 1-4<br>
<br>
Have fun!
<br><br>
NOTE: Users of first versions have to update there fhem.php to newest version and check auth.php!
      The update is done for later easy update to only replace fhem.php without reinsert login data
      etc.
