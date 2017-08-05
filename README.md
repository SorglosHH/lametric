# Lametric-Backend

1) Put the fhem.php somewhere on your webserver with php support (must be same host as fhem).

2) Set user and password for your local fhem installation inside the fhem.php.

3) Set personal security key inside the fhem.php.

4) Download and configure fhem app to your lametric time.

Note:

Sample setup inside the app:

Url:	http://www.sample.de or https://www.sample.de or https://www.sample.de/path_to_script_folder
Port:	optional for servers running on custom ports
Name:	Leading text for your value of device (default: FHEM)
Device:	Your fhem device to get state value from
Icon:	Icon to display (default is i8919 when left empty)
Seckey:	Your custom string which must be same inside fhem.php to get a result from script

Have fun!
